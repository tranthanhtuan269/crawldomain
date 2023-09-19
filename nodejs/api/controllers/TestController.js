'use strict'

const util = require('util')
const { each } = require('lodash')
const puppeteer = require('puppeteer');

const fs = require('fs');
const cookiesFilePath = 'cookies.json';
const cookiesFilePath2 = 'cookiesHammer.json';

var mysql = require('mysql');
var i = 1;
var con = mysql.createConnection({
    host: "localhost",
    database: "crawldomain",
    user: "root",
    password: ""
});

var list_domain = null;

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});

var browser = null;
var page = null;


module.exports = {

    getDomainHammer: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            browser = await puppeteer.launch({headless: false, ignoreHTTPSErrors: true});
            page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});

            const previousSession = fs.existsSync(cookiesFilePath2)
            if (previousSession) {
                // fs.unlinkSync(cookiesFilePath);
                // If file exist load the cookies
                const cookiesString = fs.readFileSync(cookiesFilePath2);
                const parsedCookies = JSON.parse(cookiesString);
                if (parsedCookies.length !== 0) {
                    for (let cookie of parsedCookies) {
                    await page.setCookie(cookie)
                    }
                    console.log('Session has been loaded in the browser')
                }
            }else{
                await page.goto('http://list.hammerheaddomains.com/login', {timeout: 0}); // wait until page load
                await page.type('#emailInput', 'tuantt6393@gmail.com');
                await page.type('#passwordInput', 'Thanhtuan@3230');
                // click and wait for navigation
                await Promise.all([
                    page.click('button[type=submit]'),
                    page.waitForNavigation()
                ]);

                // Save Session Cookies
                const cookiesObject = await page.cookies()
                // Write cookies to temp file to be used in other profile pages
                fs.writeFile(cookiesFilePath2, JSON.stringify(cookiesObject),
                function(err) {
                if (err) {
                    console.log('The file could not be written.', err)
                }
                    console.log('Session has been successfully saved')
                })
            }

            gotoPageHammer('http://list.hammerheaddomains.com/?page=', i);
        }

        async function gotoPageHammer(url, numberpage){

            // console.log(Math.floor(Math.random() * 10)*1000 + 3000);
            await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 2000));
            // await new Promise(r => setTimeout(r, 3000));
            console.log(url+numberpage)
            
            try {
                await browser.close();
                browser = await puppeteer.launch({headless: false, ignoreHTTPSErrors: true});
                page = await browser.newPage();
                await page.setViewport({width: 1200, height: 720});

                const previousSession = fs.existsSync(cookiesFilePath2)
                if (previousSession) {
                    // fs.unlinkSync(cookiesFilePath);
                    // If file exist load the cookies
                    const cookiesString = fs.readFileSync(cookiesFilePath2);
                    const parsedCookies = JSON.parse(cookiesString);
                    if (parsedCookies.length !== 0) {
                        for (let cookie of parsedCookies) {
                        await page.setCookie(cookie)
                        }
                        console.log('Session has been loaded in the browser')
                    }
                }else{
                    await page.goto('http://list.hammerheaddomains.com/login', {timeout: 0}); // wait until page load
                    await page.type('#emailInput', 'tuantt6393@gmail.com');
                    await page.type('#passwordInput', 'Thanhtuan@3230');
                    // click and wait for navigation
                    await Promise.all([
                        page.click('button[type=submit]'),
                        page.waitForNavigation()
                    ]);

                    // Save Session Cookies
                    const cookiesObject = await page.cookies()
                    // Write cookies to temp file to be used in other profile pages
                    fs.writeFile(cookiesFilePath2, JSON.stringify(cookiesObject),
                    function(err) {
                    if (err) {
                        console.log('The file could not be written.', err)
                    }
                        console.log('Session has been successfully saved')
                    })
                }

                await page.goto(url+numberpage, {timeout: 0}); // wait until page load
                await page.waitForSelector('.domains-table table');
                var body_content = await page.$eval('.domains-table table', element => element.innerHTML);

                var sql = "INSERT IGNORE INTO contents3 (content) VALUES ('"+body_content.replace(/["']/g, "")+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                    if(numberpage < 489){
                        gotoPageHammer('http://list.hammerheaddomains.com/?page=', numberpage+1);
                    }
                });
            } catch(e){
                await browser.close();
                browser = await puppeteer.launch({headless: false, ignoreHTTPSErrors: true});
                page = await browser.newPage();
                await page.setViewport({width: 1200, height: 720});

                const previousSession = fs.existsSync(cookiesFilePath2)
                if (previousSession) {
                    // fs.unlinkSync(cookiesFilePath);
                    // If file exist load the cookies
                    const cookiesString = fs.readFileSync(cookiesFilePath2);
                    const parsedCookies = JSON.parse(cookiesString);
                    if (parsedCookies.length !== 0) {
                        for (let cookie of parsedCookies) {
                        await page.setCookie(cookie)
                        }
                        console.log('Session has been loaded in the browser')
                    }
                }else{
                    await page.goto('http://list.hammerheaddomains.com/login',{timeout: 0}); // wait until page load
                    await page.type('#emailInput', 'tuantt6393@gmail.com');
                    await page.type('#passwordInput', 'Thanhtuan@3230');
                    // click and wait for navigation
                    await Promise.all([
                        page.click('button[type=submit]'),
                        page.waitForNavigation()
                    ]);

                    // Save Session Cookies
                    const cookiesObject = await page.cookies()
                    // Write cookies to temp file to be used in other profile pages
                    fs.writeFile(cookiesFilePath2, JSON.stringify(cookiesObject),
                    function(err) {
                    if (err) {
                        console.log('The file could not be written.', err)
                    }
                        console.log('Session has been successfully saved')
                    })
                }

                await page.goto(url+(numberpage+1), {timeout: 0}); // wait until page load
                await page.waitForSelector('.domains-table table');
                var body_content = await page.$eval('.domains-table table', element => element.innerHTML);

                var sql = "INSERT IGNORE INTO contents3 (content) VALUES ('"+body_content.replace(/["']/g, "")+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                    if(numberpage < 489){
                        gotoPageHammer('http://list.hammerheaddomains.com/?page=', numberpage+2);
                    }
                });
            }
        }

        main();
    },

    getDomainBuyPr: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            browser = await puppeteer.launch({headless: false});
            page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});

            const previousSession = fs.existsSync(cookiesFilePath)
            if (previousSession) {
                // fs.unlinkSync(cookiesFilePath);
                // If file exist load the cookies
                const cookiesString = fs.readFileSync(cookiesFilePath);
                const parsedCookies = JSON.parse(cookiesString);
                if (parsedCookies.length !== 0) {
                    for (let cookie of parsedCookies) {
                    await page.setCookie(cookie)
                    }
                    console.log('Session has been loaded in the browser')
                }
            }else{
                await page.goto('https://buy-pr.com/user', {timeout: 0}); // wait until page load
                await page.type('#edit-name', 'dongphuong');
                await page.type('#edit-pass', '123@123aA');
                // click and wait for navigation
                await Promise.all([
                    page.click('#edit-submit'),
                    page.waitForNavigation()
                ]);

                // Save Session Cookies
                const cookiesObject = await page.cookies()
                // Write cookies to temp file to be used in other profile pages
                fs.writeFile(cookiesFilePath, JSON.stringify(cookiesObject),
                function(err) {
                if (err) {
                    console.log('The file could not be written.', err)
                }
                    console.log('Session has been successfully saved')
                })
            }

            gotoPageBuy('https://buy-pr.com', page, i);
        }

        async function gotoPageBuy(url, page, numberpage){

            // console.log(Math.floor(Math.random() * 10)*1000 + 3000);
            await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 2000));
            // await new Promise(r => setTimeout(r, 3000));
            console.log(url + '/indexed_domains?page='+numberpage)
            
            try {
                if(numberpage == 0){
                    await page.goto(url, {timeout: 0}); // wait until page load
                }else{
                    await page.goto(url + '/indexed_domains?page='+numberpage, {timeout: 0}); // wait until page load
                }
                await page.waitForSelector('table');
                var body_content = await page.$eval('table', element => element.innerHTML);

                var sql = "INSERT IGNORE INTO contents2 (content) VALUES ('"+body_content+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                    if(numberpage < 28){
                        gotoPageBuy('https://buy-pr.com', page, numberpage+1);
                    }
                });
            } catch(e){
                await browser.close();
                browser = await puppeteer.launch({headless: false});
                page = await browser.newPage();
                await page.setViewport({width: 1200, height: 720});

                const previousSession = fs.existsSync(cookiesFilePath)
                if (previousSession) {
                    // fs.unlinkSync(cookiesFilePath);
                    // If file exist load the cookies
                    const cookiesString = fs.readFileSync(cookiesFilePath);
                    const parsedCookies = JSON.parse(cookiesString);
                    if (parsedCookies.length !== 0) {
                        for (let cookie of parsedCookies) {
                        await page.setCookie(cookie)
                        }
                        console.log('Session has been loaded in the browser')
                    }
                }else{
                    await page.goto('https://buy-pr.com/user', {timeout: 0}); // wait until page load
                    await page.type('#edit-name', 'dongphuong');
                    await page.type('#edit-pass', '123@123aA');
                    // click and wait for navigation
                    await Promise.all([
                        page.click('#edit-submit'),
                        page.waitForNavigation()
                    ]);

                    // Save Session Cookies
                    const cookiesObject = await page.cookies()
                    // Write cookies to temp file to be used in other profile pages
                    fs.writeFile(cookiesFilePath, JSON.stringify(cookiesObject),
                    function(err) {
                    if (err) {
                        console.log('The file could not be written.', err)
                    }
                        console.log('Session has been successfully saved')
                    })
                }

                await page.goto(url + '/indexed_domains?page='+(numberpage+1), {timeout: 0}); // wait until page load
                await page.waitForSelector('table');
                var body_content = await page.$eval('table', element => element.innerHTML);

                var sql = "INSERT IGNORE INTO contents2 (content) VALUES ('"+body_content+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                    if(numberpage < 28){
                        gotoPageBuy('https://buy-pr.com', page, numberpage+2);
                    }
                });
            }
        }

        main();
    },

    getDomain3: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            // await page.setJavaScriptEnabled(false)

            const previousSession = fs.existsSync(cookiesFilePath)
            if (previousSession) {
                // fs.unlinkSync(cookiesFilePath);
                // If file exist load the cookies
                const cookiesString = fs.readFileSync(cookiesFilePath);
                const parsedCookies = JSON.parse(cookiesString);
                if (parsedCookies.length !== 0) {
                    for (let cookie of parsedCookies) {
                    await page.setCookie(cookie)
                    }
                    console.log('Session has been loaded in the browser')
                }
            }else{
                await page.goto('https://www.expireddomains.net/login/', {timeout: 0}); // wait until page load
                await page.type('#inputLogin', 'phonghao199888888');
                await page.type('#inputPassword', 'phonghao199888888');
                // click and wait for navigation
                await Promise.all([
                    page.click('.col-sm-12 button[type=submit]'),
                    page.waitForNavigation({timeout: 0})
                ]);

                // Save Session Cookies
                const cookiesObject = await page.cookies()
                // Write cookies to temp file to be used in other profile pages
                fs.writeFile(cookiesFilePath, JSON.stringify(cookiesObject),
                function(err) {
                if (err) {
                    console.log('The file could not be written.', err)
                }
                    console.log('Session has been successfully saved')
                })
            }

            gotoPage('https://member.expireddomains.net/domains/combinedexpired/', page, 0);
        }

        async function gotoPage(url, page, numberpage){
            // console.log(Math.floor(Math.random() * 10)*1000 + 3000);
            await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 5000));
            // await new Promise(r => setTimeout(r, 3000));
            console.log(url + '?start='+numberpage+'#listing')
            await page.goto(url + '?start='+numberpage+'#listing', {timeout: 0}); // wait until page load

            try {
                await page.waitForSelector('.base1');
                var body_content = await page.$eval('.base1', element => element.innerHTML);

                var sql = "INSERT IGNORE INTO contents (content) VALUES ('"+body_content+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                    if(numberpage < 1318825){
                        gotoPage('https://member.expireddomains.net/domains/combinedexpired/', page, numberpage + 25);
                    }
                });
            } catch(e){}

            // await browser.close();
        }

        main();
    },

    getDomain: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        (async () => {
            try {
                const browser = await puppeteer.launch({
                    headless: headless,
                    args: ["--no-sandbox", "--disabled-setupid-sandbox"],
                });

                var url = "https://www.spamzilla.io/free/"+b;

                const page = await browser.newPage();
                await page.setUserAgent(userAgent.toString())
                await page.goto(encodeURI(url), {
                    waitUntil: 'load',
                    timeout: 0
                });

                try {
                    await page.waitForSelector('body');
                    var body_content = await page.$eval('body', element => element.innerHTML);
                } catch(e){}

                res.json([body_content])
                await browser.close();
            } catch (error) {
                console.log(error)
            }
        })();
    },

    getDomain2: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            await page.goto('https://www.spamzilla.io/account/login/', {timeout: 0}); // wait until page load
            await page.type('#loginform-email', 'tuantt6393@gmail.com');
            await page.type('#loginform-password', 'sRfPsKn2Ua');
            // click and wait for navigation
            await Promise.all([
                page.click('button[type=submit]'),
                page.waitForNavigation({ waitUntil: 'networkidle0' }),
            ]);

            try {
                await page.waitForSelector('body');
                var body_content = await page.$eval('body', element => element.innerHTML);
            } catch(e){}

            res.json([body_content])
            await browser.close();
        }

        main();
    },

    getDomain4: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            await page.setJavaScriptEnabled(true)
            await page.goto('https://domainhuntergatherer.com/member/login', {timeout: 0}); // wait until page load
            await page.type('#amember-login', 'tuantt6393');
            await page.type('#amember-pass', 'Thanhtuan@3230');

            try {
                await page.waitForSelector('#recaptcha-anchor', {timeout:100000});
            } catch (error) {

                const elementHandle = await page.waitForSelector('iframe', {timeout:100000});
                const frame = await elementHandle.contentFrame();
                var captcha = await frame.waitForSelector('#recaptcha-anchor', {timeout:100000});
                await captcha.evaluate(b => b.click());
            }

            // click and wait for navigation
            await Promise.all([
                page.click('#recaptcha-anchor'),
                page.click('input[type=submit]'),
                page.waitForNavigation({ waitUntil: 'networkidle0' }),
            ]);

            try {
                await page.waitForSelector('body', {timeout:100000});
                var body_content = await page.$eval('body', element => element.innerHTML);
            } catch(e){}

            res.json([body_content])
            await browser.close();
        }

        main();
    },

    getDomain5: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            await page.setJavaScriptEnabled(true)
            await page.goto('https://domainhuntergatherer.com/member/login', {timeout: 0}); // wait until page load
            await page.type('#amember-login', 'tuantt6393');
            await page.type('#amember-pass', 'Thanhtuan@3230');

            try {
                await page.waitForSelector('#recaptcha-anchor', {timeout:100000});
            } catch (error) {

                const elementHandle = await page.waitForSelector('iframe', {timeout:100000});
                const frame = await elementHandle.contentFrame();
                var captcha = await frame.waitForSelector('#recaptcha-anchor', {timeout:100000});
                await captcha.evaluate(b => b.click());
            }

            // click and wait for navigation
            await Promise.all([
                page.click('#recaptcha-anchor'),
                page.click('input[type=submit]'),
                page.waitForNavigation({ waitUntil: 'networkidle0' }),
            ]);

            try {
                await page.waitForSelector('body', {timeout:100000});
                var body_content = await page.$eval('body', element => element.innerHTML);
            } catch(e){}

            res.json([body_content])
            await browser.close();
        }

        main();
    },

    dapachecker: (req, res) => {

        // https://www.robingupta.com/wp-content/plugins/mng_domain_auth_v3//alexa.action.php?sitename=gumushaneescorttel.com&page_token=get_website&null&da=y&ip=y&pa=y&ss=y&v=1
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            // browser = await puppeteer.launch({args: ['--no-sandbox']});

            // node native promisify
            const query = util.promisify(con.query).bind(con);

            (async () => {
                try {
                    const rows = await query("SELECT name FROM domains where name like '%.com' and status = 0 limit 10");
                    list_domain = '';
                    rows.forEach(element => {
                        list_domain += ',' + element.name
                    });

                    if(list_domain.length > 0){
                        godapachecker(list_domain.substring(1), query)
                    }

                    
                } finally {
                    // con.end();
                }
            })()
        }

        async function godapachecker(domain_list, query){

            await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 2000));

            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setJavaScriptEnabled(true)
            await page.goto('https://www.dapachecker.org/', {timeout: 0}); // wait until page load
            await page.screenshot({path: 'step1.png'});
            
            await page.waitForSelector('.fetch_data');
            await page.type('.fetch_data', domain_list);

            let xhrCatcher = page.waitForResponse(r => r.request().url().includes('checkDA_new') && r.request().method() != 'OPTIONS');
            page.click('#tool_btn_container');
            let xhrResponse = await xhrCatcher;

            // now get the JSON payload
            let xhrPayload = await xhrResponse.json();
            console.log(xhrPayload.data[0].domain)
            console.log(xhrPayload.data[0].site_da)
            console.log(xhrPayload.data[0].site_pa)
            console.log(xhrPayload.data[0].site_mr)
            console.log(xhrPayload.data[0].spam_score)
            console.log('xhrPayload', xhrPayload);

            xhrPayload.data.forEach(element => {
                query("UPDATE domains set da = '"+element.site_da+"', pa = '"+element.site_pa+"', status = 1 where name = '"+element.domain+"'");
            });

            await page.screenshot({path: 'step2.png'});
            await browser.close();

            main();
        }

        main();

    },

    snapnames: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {

            // puppeteer-extra is a drop-in replacement for puppeteer, 
            // it augments the installed puppeteer with plugin functionality 
            const puppeteer = require('puppeteer-extra') 
            
            // add stealth plugin and use defaults (all evasion techniques) 
            const StealthPlugin = require('puppeteer-extra-plugin-stealth') 
            puppeteer.use(StealthPlugin()) 
            
            const {executablePath} = require('puppeteer') 
            
            // puppeteer usage as normal 
            // puppeteer.launch({ headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe' }).then(async browser => { 
            //     const page = await browser.newPage() 
            //     await page.goto('https://www.snapnames.com') 
            //     await page.waitForTimeout(2000) 
            //     await page.screenshot({ path: 'cointracker_home.png', fullPage: true }) 
            //     await browser.close() 
            // })


            const browser = await puppeteer.launch({headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'});
            const page = await browser.newPage();
            await page.goto('https://www.snapnames.com/store/exclusivestorefront.action'); // wait until page load
            await page.waitForSelector('.searchResults tbody tr');
            var domains = await page.$$('.searchResults tbody tr');
            let arr_data = [];
        
            for (let i = 0; i < domains.length; i++) {
                const domain = await domains[i].$eval('.left.all', el => el.textContent.trim());
                console.log(domain)
                // arr_data.push(domain);
            }


            let pageCount = 5761;
            let arr_page_web_clone = [];
            for (var i = 2; i <= pageCount; i++) {
              arr_page_web_clone.push(i);
            }
          
            for (let page_idx = 1; page_idx <= pageCount; page_idx++) {
              var goToNext = await page.waitForSelector('.goToNext', {timeout:100});
              await goToNext.evaluate(b => b.click());
              await page.waitForResponse(response => response.url().includes('exclusivestorefront.action') && response.status() == 200);
              await page.waitForSelector('.searchResults tbody tr');
            
              domains = await page.$$('.searchResults tbody tr');
              for (let j = 0; j < domains.length; j++) {
                const domain = await domains[j].$eval('.left.all', el => el.textContent.trim());
                console.log(domain)
              }
            }


            
            // await browser.close();
            // await page.waitForSelector('#challenge-form');
            // await page.evaluate(() => {
            //     document.querySelector('#challenge-form').submit();
            // });

            // await page.waitForNavigation();

            // // await page.waitForSelector('body', {timeout:0});
            
            // // const myValue = 500;
            // // await page.$eval('.itemsPerPageSelect', (element, myValue) => {
            // //     element.value = myValue;
            // //     const event = new Event('change');
            // //     element.dispatchEvent(event);
            // // }, myValue);

            // try {
            //     await page.waitForSelector('body', {timeout:0});
            //     var body_content = await page.$eval('body', element => element.innerHTML);
            // } catch(e){}

            // res.json([body_content])
            // await browser.close();
        }

        main();

    },
}

'use strict'

const util = require('util')
const { each } = require('lodash')
const puppeteer = require('puppeteer');

const fs = require('fs');
const cookiesFilePath = 'cookies.json';
const cookiesFilePath2 = 'cookiesHammer.json';
const cookiesFilePath3 = 'cookiesNoxtools.json';

var mysql = require('mysql');
var i = 1;
var con = mysql.createConnection({
    host: "104.237.159.237",
    database: "crawldomain",
    user: "tuantt",
    password: "Maiyeu@123"
});

var list_domain = null;

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});

var browser = null;
var page = null;


module.exports = {

    noxtools: (req, res) => {
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

            const browser = await puppeteer.launch({headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'});
            page = await browser.newPage();

            const previousSession = fs.existsSync(cookiesFilePath3)
            if (previousSession) {
                // fs.unlinkSync(cookiesFilePath);
                // If file exist load the cookies
                const cookiesString = fs.readFileSync(cookiesFilePath3);
                const parsedCookies = JSON.parse(cookiesString);
                if (parsedCookies.length !== 0) {
                    for (let cookie of parsedCookies) {
                    await page.setCookie(cookie)
                    }
                    console.log('Session has been loaded in the browser')
                }
            }else{
                await page.goto('https://noxtools.com/secure/login?amember_redirect_url=https%3A%2F%2Fnoxtools.com%2Fsecure%2Fpage%2FSpamzilla', {timeout: 10000}); // wait until page load
                await page.waitForSelector('body');
                await page.type('#amember-login', 'dttphuong');
                await page.type('#amember-pass', 'DttphuongZilla2');
                // click and wait for navigation
                await Promise.all([
                    page.click('input[type=submit]'),
                    page.waitForNavigation()
                ]);

                // Save Session Cookies
                const cookiesObject = await page.cookies()
                // Write cookies to temp file to be used in other profile pages
                fs.writeFile(cookiesFilePath3, JSON.stringify(cookiesObject),
                function(err) {
                if (err) {
                    console.log('The file could not be written.', err)
                }
                    console.log('Session has been successfully saved')
                })
            }

            gotoPageNoxtools('https://spamzilla.noxtools.com/domains/?per-page=25&page=', 4500);
        }

        async function gotoPageNoxtools(url, numberpage){
            console.log(url+numberpage);
            // await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 2000));
            // await new Promise(r => setTimeout(r, 3000));
            
            try {
                await page.goto(url+numberpage, {timeout: 0}); // wait until page load
                await page.waitForSelector('.domains-table tbody tr.expired-domains');
                var domains = await page.$$('.domains-table tbody tr.expired-domains');

                for (let i = 0; i < domains.length; i++) {
                    const domain = await domains[i].$eval('.expired-domains:nth-child(2)', el => el.textContent.trim());
                    const source = await domains[i].$eval('.td_data_source a', el => el.href);
                    const tf = await domains[i].$eval('.td_majestic_tf a', el => el.textContent.trim());
                    const cf = await domains[i].$eval('.td_majestic_cf', el => el.textContent.trim());
                    const bl = await domains[i].$eval('.td_majestic_bl', el => el.textContent.trim());
                    const rd = await domains[i].$eval('.td_majestic_rd', el => el.textContent.trim());
                    const languages = await domains[i].$eval('.td_languages', el => el.textContent.trim());
                    const da = await domains[i].$eval('.td_moz_da', el => el.textContent.trim());
                    const pa = await domains[i].$eval('.td_moz_pa', el => el.textContent.trim());
                    const age = await domains[i].$eval('.td_age', el => el.textContent.trim());
                    let score = 0;
                    try{
                        score = await domains[i].$eval('.td_sz_score strong', el => el.textContent.trim());
                    }catch(error){
                        score = await domains[i].$eval('.td_sz_score', el => el.textContent.trim());
                    }
                    const redirects = await domains[i].$eval('.td_redirects', el => el.textContent.trim());
                    const history = await domains[i].$eval('.td_active_history', el => el.textContent.trim());
                    const domain_drops = await domains[i].$eval('.td_domain_drops', el => el.textContent.trim());
                    const total_organic_results = await domains[i].$eval('.td_total_organic_results', el => el.textContent.trim());
                    const semrush_traffic = await domains[i].$eval('.td_semrush_traffic', el => el.textContent.trim());
                    const semrush_rank = await domains[i].$eval('.td_semrush_rank', el => el.textContent.trim());
                    const semrush_keyword_number = await domains[i].$eval('.td_semrush_keyword_number', el => el.textContent.trim());
                    const date_added = await domains[i].$eval('.td_date_added', el => el.textContent.trim());
                    const price = await domains[i].$eval('.td_price', el => el.textContent.trim());
                    const expiry_date = await domains[i].$eval('.td_expiry_date', el => el.textContent.trim());

                    console.log('domain: ' + domain);
                    // console.log('source: ' + source);
                    // console.log('tf: ' + tf);
                    // console.log('cf: ' + cf);
                    // console.log('bl: ' + bl);
                    // console.log('rd: ' + rd);
                    // console.log('languages: ' + languages);
                    // console.log('da: ' + da);
                    // console.log('pa: ' + pa);
                    // console.log('age: ' + age);
                    // console.log('score: ' + score);
                    // console.log('redirects: ' + redirects);
                    // console.log('history: ' + history);
                    // console.log('domain_drops: ' + domain_drops);
                    // console.log('total_organic_results: ' + total_organic_results);
                    // console.log('semrush_traffic: ' + semrush_traffic);
                    // console.log('semrush_rank: ' + semrush_rank);
                    // console.log('semrush_keyword_number: ' + semrush_keyword_number);
                    // console.log('date_added: ' + date_added);
                    // console.log('price: ' + price);
                    // console.log('expiry_date: ' + expiry_date);
                    console.log('--------------------');
                    // insert ignore 
                    var sql = "INSERT IGNORE INTO domain2 (domain, source, tf, cf, bl, rd, languages, da, pa, age, score, redirects, history, domain_drops, total_organic_results, semrush_traffic, semrush_rank, semrush_keyword_number, date_added, price, expiry_date) VALUES ('"+ domain +"', '"+ source +"', '"+ tf +"', '"+ cf +"', '"+ bl +"', '"+ rd +"', '"+ languages +"', '"+ da +"', '"+ pa +"', '"+ age +"', '"+ score +"', '"+ redirects +"', '"+ history +"', '"+ domain_drops +"', '"+ total_organic_results +"', '"+ semrush_traffic +"', '"+ semrush_rank +"', '"+ semrush_keyword_number +"', '"+ date_added +"', '"+ price +"', '"+ expiry_date +"')";
                    con.query(sql, function (err, result) {
                        if (err) throw err;
                        console.log("1 record inserted");
                    });
                }

                gotoPageNoxtools('https://spamzilla.noxtools.com/domains/?per-page=25&page=', numberpage+1);
            } catch(e){
                console.log(e);
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
            const browser = await puppeteer.launch({headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            await page.setJavaScriptEnabled(true)
            await page.goto('https://searchenginereports.net/referring-domains', {timeout: 0}); // wait until page load
            await page.type('input[name="url"]', 'http://cwmetalhk.com');

            try {
                await page.waitForSelector('button[type=submit]', {timeout:100000});
            } catch (error) {
                const elementHandle = await page.waitForSelector('iframe', {timeout:100000});
                const frame = await elementHandle.contentFrame();
                var captcha = await frame.waitForSelector('button[type=submit]', {timeout:100000});
                await captcha.evaluate(b => b.click());
            }

            

            // try {
            //     await page.waitForSelector('body', {timeout:100000});
            //     var body_content = await page.$eval('body', element => element.innerHTML);
            // } catch(e){}

            // res.json([body_content])
            // await browser.close();
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
                    const rows = await query("SELECT name FROM domains where name like '%.com' and state = 0 limit 10");
                    list_domain = '';
                    rows.forEach(element => {
                        list_domain += ',' + element.name
                    });
                    console.log(list_domain);

                    if(list_domain.length > 0){
                        godapachecker(list_domain.substring(1), query)
                    }

                    
                } catch(e){
                    main();
                }
                finally {
                    // con.end();
                }
            })()
        }

        async function godapachecker(domain_list, query){

            await new Promise(r => setTimeout(r, Math.floor(Math.random() * 10)*1000 + 2000));

            // puppeteer-extra is a drop-in replacement for puppeteer, 
            // it augments the installed puppeteer with plugin functionality 
            const puppeteer = require('puppeteer-extra') 
            
            // add stealth plugin and use defaults (all evasion techniques) 
            const StealthPlugin = require('puppeteer-extra-plugin-stealth') 
            puppeteer.use(StealthPlugin()) 
            
            const {executablePath} = require('puppeteer') 

            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setJavaScriptEnabled(true)
            await page.goto('https://www.dapachecker.org/', {timeout: 0}); // wait until page load
            await page.screenshot({path: 'step1.png'});
            
            await page.waitForSelector('.fetch_data');
            await page.type('.fetch_data', domain_list);
            
            try {
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
                if(xhrPayload.data.length > 0){
                    xhrPayload.data.forEach(element => {
                        query("UPDATE domains set da = '"+element.site_da+"', pa = '"+element.site_pa+"', state = 1 where name = '"+element.domain+"'");
                    });
                }
            } catch(e){
                await browser.close();
                main();
            }

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

            const query = util.promisify(con.query).bind(con);
            const browser = await puppeteer.launch({headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'});
            const page = await browser.newPage();
            await page.goto('https://www.snapnames.com/store/exclusivestorefront.action'); // wait until page load
            await page.waitForSelector('.searchResults tbody tr');
            var domains = await page.$$('.searchResults tbody tr');
            let arr_data = [];
        
            for (let i = 0; i < domains.length; i++) {
                const domain = await domains[i].$eval('.left.all', el => el.textContent.trim());
                const bid = await domains[i].$eval('.right.all', el => el.textContent.trim());
                const status = await domains[i].$eval('.status.left', el => el.textContent.trim());
                const order = await domains[i].$eval('.left.dtOrderBy', el => el.textContent.trim());

                // insert ignore 
                var sql = "INSERT IGNORE INTO domains (name, price, status, order_time) VALUES ('"+domain+"', '"+bid.substr(1).replaceAll(",","")+"', '"+status+"', '"+processTime(order)+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                });

                query("UPDATE domains set price = '"+bid.substr(1).replaceAll(",","")+"', status = '"+status+"', order_time = '"+processTime(order)+"' where name = '"+domain+"'");

                console.log(domain, bid.substr(1).replaceAll(",",""), status, processTime(order))
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
                const bid = await domains[j].$eval('.right.all', el => el.textContent.trim());
                const status = await domains[j].$eval('.status.left', el => el.textContent.trim());
                const order = await domains[j].$eval('.left.dtOrderBy', el => el.textContent.trim());

                // insert ignore 
                var sql = "INSERT IGNORE INTO domains (name, price, status, order_time) VALUES ('"+domain+"', '"+bid.substr(1).replaceAll(",","")+"', '"+status+"', '"+processTime(order)+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                });

                query("UPDATE domains set price = '"+bid.substr(1).replaceAll(",","")+"', status = '"+status+"', order_time = '"+processTime(order)+"' where name = '"+domain+"'");

                // update
                console.log(domain, bid.substr(1).replaceAll(",",""), status, processTime(order))
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

        var months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];

        function processTime(time){
            // check length to type of time
            if(time.length > 10){
                time = time.trim();
                var monthChar = time.substr(0, 3);
                time = time.substr(4);
                var dateChar = time.split(",")[0];
                time = time.split(",")[1];
                var yearChar = time.substr(1, 4);
                time = time.substr(6);
                var hourChar = time.split(":")[0];
                time = time.split(":")[1];
                var minuteChar = time.split(" ")[0];
                var apmChar = time.split(" ")[1];
                if(apmChar == 'PM'){
                    return  yearChar + '-' + pad(parseInt((months.findIndex(x => x == monthChar) + 1))) + '-' + pad(parseInt(dateChar)) + ' ' + pad((parseInt(hourChar) + 12)%24) + ':' + pad(parseInt(minuteChar)) + ':' + '00';
                }
                return  yearChar + '-' + pad(parseInt((months.findIndex(x => x == monthChar) + 1))) + '-' + pad(parseInt(dateChar)) + ' ' + pad(parseInt(hourChar)) + ':' + pad(parseInt(minuteChar)) + ':' + '00';
            }else{
                if(time.length > 3){
                    var hourChar = time.split("h")[0].trim();
                    var minuteChar = time.split("h")[1].substr(1, 2);
                    let dt = new Date();
                    dt.setHours(dt.getHours() + parseInt(hourChar), dt.getMinutes() + parseInt(minuteChar));
                    return dt.getFullYear() + '-' + pad(dt.getMonth()) + '-' + pad(dt.getDate()) + ' ' + pad(dt.getHours()) + ':' + pad(dt.getMinutes()) + ':' + '00';
                }else{
                    let dt = new Date();
                    return dt.getFullYear() + '-' + pad(dt.getMonth()) + '-' + pad(dt.getDate()) + ' ' + pad(dt.getHours()) + ':' + pad(dt.getMinutes()) + ':' + '00';
                }
            }
            return 0;
        }

        function pad(d) {
            return (d < 10) ? '0' + d.toString() : d.toString();
        }

        main();

    },

    spamzilla: (req, res) => {
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

            const query = util.promisify(con.query).bind(con);
            const browser = await puppeteer.launch({headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'});
            const page = await browser.newPage();
            await page.goto('https://noxtools.com/secure/login?amember_redirect_url=https%3A%2F%2Fnoxtools.com%2Fsecure%2Fpage%2FSpamzilla'); // wait until page load
            await page.waitForSelector('.searchResults tbody tr');
            var domains = await page.$$('.searchResults tbody tr');
            let arr_data = [];
        
            for (let i = 0; i < domains.length; i++) {
                const domain = await domains[i].$eval('.left.all', el => el.textContent.trim());
                const bid = await domains[i].$eval('.right.all', el => el.textContent.trim());
                const status = await domains[i].$eval('.status.left', el => el.textContent.trim());
                const order = await domains[i].$eval('.left.dtOrderBy', el => el.textContent.trim());

                // insert ignore 
                var sql = "INSERT IGNORE INTO domains (name, price, status, order_time) VALUES ('"+domain+"', '"+bid.substr(1).replaceAll(",","")+"', '"+status+"', '"+processTime(order)+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                });

                query("UPDATE domains set price = '"+bid.substr(1).replaceAll(",","")+"', status = '"+status+"', order_time = '"+processTime(order)+"' where name = '"+domain+"'");

                console.log(domain, bid.substr(1).replaceAll(",",""), status, processTime(order))
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
                const bid = await domains[j].$eval('.right.all', el => el.textContent.trim());
                const status = await domains[j].$eval('.status.left', el => el.textContent.trim());
                const order = await domains[j].$eval('.left.dtOrderBy', el => el.textContent.trim());

                // insert ignore 
                var sql = "INSERT IGNORE INTO domains (name, price, status, order_time) VALUES ('"+domain+"', '"+bid.substr(1).replaceAll(",","")+"', '"+status+"', '"+processTime(order)+"')";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log("1 record inserted");
                });

                query("UPDATE domains set price = '"+bid.substr(1).replaceAll(",","")+"', status = '"+status+"', order_time = '"+processTime(order)+"' where name = '"+domain+"'");

                // update
                console.log(domain, bid.substr(1).replaceAll(",",""), status, processTime(order))
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

        var months = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];

        function processTime(time){
            // check length to type of time
            if(time.length > 10){
                time = time.trim();
                var monthChar = time.substr(0, 3);
                time = time.substr(4);
                var dateChar = time.split(",")[0];
                time = time.split(",")[1];
                var yearChar = time.substr(1, 4);
                time = time.substr(6);
                var hourChar = time.split(":")[0];
                time = time.split(":")[1];
                var minuteChar = time.split(" ")[0];
                var apmChar = time.split(" ")[1];
                if(apmChar == 'PM'){
                    return  yearChar + '-' + pad(parseInt((months.findIndex(x => x == monthChar) + 1))) + '-' + pad(parseInt(dateChar)) + ' ' + pad((parseInt(hourChar) + 12)%24) + ':' + pad(parseInt(minuteChar)) + ':' + '00';
                }
                return  yearChar + '-' + pad(parseInt((months.findIndex(x => x == monthChar) + 1))) + '-' + pad(parseInt(dateChar)) + ' ' + pad(parseInt(hourChar)) + ':' + pad(parseInt(minuteChar)) + ':' + '00';
            }else{
                if(time.length > 3){
                    var hourChar = time.split("h")[0].trim();
                    var minuteChar = time.split("h")[1].substr(1, 2);
                    let dt = new Date();
                    dt.setHours(dt.getHours() + parseInt(hourChar), dt.getMinutes() + parseInt(minuteChar));
                    return dt.getFullYear() + '-' + pad(dt.getMonth()) + '-' + pad(dt.getDate()) + ' ' + pad(dt.getHours()) + ':' + pad(dt.getMinutes()) + ':' + '00';
                }else{
                    let dt = new Date();
                    return dt.getFullYear() + '-' + pad(dt.getMonth()) + '-' + pad(dt.getDate()) + ' ' + pad(dt.getHours()) + ':' + pad(dt.getMinutes()) + ':' + '00';
                }
            }
            return 0;
        }

        function pad(d) {
            return (d < 10) ? '0' + d.toString() : d.toString();
        }

        main();

    },
}

'use strict'

const util = require('util')
const { each } = require('lodash')
const puppeteer = require('puppeteer');

const fs = require('fs');
const cookiesFilePath = 'cookies.json';

var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    database: "crawldomain",
    user: "root",
    password: ""
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});


module.exports = {

    getDomain3: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            const browser = await puppeteer.launch({headless: false});
            const page = await browser.newPage();
            await page.setViewport({width: 1200, height: 720});
            await page.setJavaScriptEnabled(false)

            const previousSession = fs.existsSync(cookiesFilePath)
            if (previousSession) {
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
                await page.goto('https://www.expireddomains.net/login/', { waitUntil: 'networkidle0' }); // wait until page load
                await page.type('#inputLogin', 'phonghao19988888');
                await page.type('#inputPassword', 'phonghao19988888');
                // click and wait for navigation
                await Promise.all([
                    page.click('.col-sm-12 button[type=submit]'),
                    page.waitForNavigation({ waitUntil: 'networkidle0' })
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
            await new Promise(r => setTimeout(r, 3000));
            console.log(url + '?start='+numberpage+'#listing')
            await page.goto(url + '?start='+numberpage+'#listing', { waitUntil: 'networkidle0' }); // wait until page load

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
            await page.goto('https://www.spamzilla.io/account/login/', { waitUntil: 'networkidle0' }); // wait until page load
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
            await page.goto('https://domainhuntergatherer.com/member/login', { waitUntil: 'networkidle0' }); // wait until page load
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
            await page.goto('https://domainhuntergatherer.com/member/login', { waitUntil: 'networkidle0' }); // wait until page load
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
}

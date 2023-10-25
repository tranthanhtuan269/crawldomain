'use strict'

const util = require('util')
const { each } = require('lodash')
const puppeteer = require('puppeteer');
const pptr = require('puppeteer-core');

const fs = require('fs');
const cookiesFilePath = 'cookies.json';
const cookiesFilePath3 = 'cookiesNoxtools.json';
const logFile = 'log.txt';

var mysql = require('mysql');
var i = 1;
// var con = mysql.createConnection({
//     host: "104.237.159.237",
//     database: "crawldomain",
//     user: "tuantt",
//     password: "Maiyeu@123"
// });

var con = mysql.createConnection({
    host: "127.0.0.1",
    database: "crawldomain",
    user: "root",
    password: ""
});

var list_domain = null;

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});

var page = null;
var urll = 'https://noxtools.com/secure/login?amember_redirect_url=https%3A%2F%2Fnoxtools.com%2Fsecure%2Fpage%2FSpamzilla';
var config = {headless: false, executablePath: 'C:/Program Files/Google/Chrome/Application/chrome.exe'};
var user = 'dttphuong';
var pass = 'DttphuongZilla2';
var domain = 'https://spamzilla.noxtools.com/';
// var domain = 'https://sz.noxtools.com/';
var currentPage = -1;

module.exports = {

    noxtools: (req, res) => {
        // var region = req.params.region;
        var b = req.query.b;
        async function main() {
            try {
                const logFileContent = fs.existsSync(logFile)
                if (logFileContent) {
                    currentPage = fs.readFileSync(logFile, 'utf8');
                }
            } catch (err) {
                console.error(err);
            }

            // puppeteer-extra is a drop-in replacement for puppeteer, 
            // it augments the installed puppeteer with plugin functionality 
            const puppeteer = require('puppeteer-extra') 
            
            // add stealth plugin and use defaults (all evasion techniques) 
            const StealthPlugin = require('puppeteer-extra-plugin-stealth') 
            puppeteer.use(StealthPlugin()) 
            

            const browser = await puppeteer.launch(config);
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
                await page.goto(urll); // wait until page load
                await page.waitForSelector('#amember-login');
                await page.type('#amember-login', user);
                await page.type('#amember-pass', pass);
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

            gotoPageNoxtools(domain + 'domains/?per-page=200&page=', currentPage);
        }

        async function gotoPageNoxtools(url, numberpage){
            var t = Math.floor(Math.random() * 5)*1000;
            console.log("please wait " + t + " second");
            await new Promise(r => setTimeout(r, t));
            const fs = require('fs').promises;
            fs.writeFile(logFile, numberpage + "",
            function(err) {
                if (err) {
                    console.log('The file could not be written.', err)
                }
                    console.log('Session has been successfully saved')
                }
            )
            console.log(url+numberpage);
            
            try {
                await page.goto(url+numberpage, { waitUntil: 'load' }); // wait until page load
                await page.waitForSelector('.domains-table tbody tr.expired-domains');
                var domains = await page.$$('.domains-table tbody tr.expired-domains');

                for (let i = 0; i < domains.length; i++) {
                    const domain = await domains[i].$eval('.expired-domains:nth-child(2)', el => el.textContent.trim());
                    const source = await domains[i].$eval('.td_data_source a', el => el.href);
                    let tf = await domains[i].$eval('.td_majestic_tf', el => el.textContent.trim());
                    let cf = await domains[i].$eval('.td_majestic_cf', el => el.textContent.trim());
                    let bl = await domains[i].$eval('.td_majestic_bl', el => el.textContent.trim());
                    let rd = await domains[i].$eval('.td_majestic_rd', el => el.textContent.trim());
                    let languages = await domains[i].$eval('.td_languages', el => el.textContent.trim());
                    let da = await domains[i].$eval('.td_moz_da', el => el.textContent.trim());
                    let pa = await domains[i].$eval('.td_moz_pa', el => el.textContent.trim());
                    let age = await domains[i].$eval('.td_age', el => el.textContent.trim());
                    let score = 0;
                    try{
                        score = await domains[i].$eval('.td_sz_score strong', el => el.textContent.trim());
                    }catch(error){
                        score = await domains[i].$eval('.td_sz_score', el => el.textContent.trim());
                    }
                    let redirects = await domains[i].$eval('.td_redirects', el => el.textContent.trim());
                    // let redirects = -1;
                    let history = await domains[i].$eval('.td_active_history', el => el.textContent.trim());
                    // let history = -1;
                    let domain_drops = await domains[i].$eval('.td_domain_drops', el => el.textContent.trim());
                    let total_organic_results = await domains[i].$eval('.td_total_organic_results', el => el.textContent.trim());
                    let semrush_traffic = await domains[i].$eval('.td_semrush_traffic', el => el.textContent.trim());
                    let semrush_rank = await domains[i].$eval('.td_semrush_rank', el => el.textContent.trim());
                    // let semrush_keyword_number = await domains[i].$eval('.td_semrush_keyword_number', el => el.textContent.trim());
                    let semrush_keyword_number = -1;
                    let date_added = await domains[i].$eval('.td_date_added', el => el.textContent.trim());
                    let price = await domains[i].$eval('.td_price', el => el.textContent.trim());
                    let expiry_date = await domains[i].$eval('.td_expiry_date', el => el.textContent.trim());
 
                    (tf == '' || tf == '-') ? tf = -1 : tf = tf;
                    (cf == '' || cf == '-') ? cf = -1 : cf = cf;
                    (bl == '' || bl == '-') ? bl = -1 : bl = bl;
                    (rd == '' || rd == '-') ? rd = -1 : rd = rd;
                    (languages == '' || languages == '-') ? languages = -1 : languages = languages;
                    (da == '' || da == '-') ? da = -1 : da = da;
                    (pa == '' || pa == '-') ? pa = -1 : pa = pa;
                    (age == '' || age == '-') ? age = -1 : age = age;
                    (score == '' || score == '-') ? score = -1 : score = score;
                    (redirects == '' || redirects == '-') ? redirects = -1 : redirects = redirects;
                    (history == '' || history == '-') ? history = -1 : history = history;
                    (domain_drops == '' || domain_drops == '-') ? domain_drops = -1 : domain_drops = domain_drops;
                    (total_organic_results == '' || total_organic_results == '-') ? total_organic_results = -1 : total_organic_results = total_organic_results;
                    (semrush_traffic == '' || semrush_traffic == '-') ? semrush_traffic = -1 : semrush_traffic = semrush_traffic;
                    (semrush_rank == '' || semrush_rank == '-') ? semrush_rank = -1 : semrush_rank = semrush_rank;
                    (semrush_keyword_number == '' || semrush_keyword_number == '-') ? semrush_keyword_number = -1 : semrush_keyword_number = semrush_keyword_number;
                    (date_added == '' || date_added == '-') ? date_added = -1 : date_added = date_added;
                    (price == '' || price == '-') ? price = -1 : price = price;
                    (expiry_date == '' || expiry_date == '-') ? expiry_date = -1 : expiry_date = expiry_date;

                    // insert ignore 
                    var sql = "INSERT IGNORE INTO domains (domain, source, tf, cf, bl, rd, languages, da, pa, age, score, redirects, history, domain_drops, total_organic_results, semrush_traffic, semrush_rank, semrush_keyword_number, date_added, price, expiry_date) VALUES ('"+ domain +"', '"+ source +"', '"+ tf +"', '"+ cf +"', '"+ bl +"', '"+ rd +"', '"+ languages +"', '"+ da +"', '"+ pa +"', '"+ age +"', '"+ score +"', '"+ redirects +"', '"+ history +"', '"+ domain_drops +"', '"+ total_organic_results +"', '"+ semrush_traffic +"', '"+ semrush_rank +"', '"+ semrush_keyword_number +"', '"+ date_added +"', '"+ price +"', '"+ expiry_date +"')";
                    try{
                        con.query(sql);
                        console.log("domain: " + domain + " is added to system");
                    }catch(e){
                        console.log("domain: " + domain + " is existed");
                    }
                }

                gotoPageNoxtools(domain + 'domains/?per-page=200&page=', parseInt(numberpage)+1);
            } catch(e){
                console.log(e);
                main();
            }
        }

        main();
    },

    test: (req, res) => {
        async function main() {
            // puppeteer-extra is a drop-in replacement for puppeteer, 
            // it augments the installed puppeteer with plugin functionality 
            const puppeteer = require('puppeteer-extra') 
            
            // add stealth plugin and use defaults (all evasion techniques) 
            const StealthPlugin = require('puppeteer-extra-plugin-stealth') 
            puppeteer.use(StealthPlugin()) 
            
            // puppeteer usage as normal 
            puppeteer.launch({ headless: true}).then(async browser => { 
                const page = await browser.newPage() 
                await page.goto('https://www.cointracker.io/') 
                await page.waitForTimeout(2000) 
                await page.screenshot({ path: 'cointracker_home.png', fullPage: true }) 
                await browser.close() 
            });
        }

        main();
    }
}

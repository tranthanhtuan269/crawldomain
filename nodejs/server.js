const express = require('express')
const app = express()
require('dotenv').config()
puppeteer = require('puppeteer-extra');
AdblockerPlugin = require('puppeteer-extra-plugin-adblocker');
StealthPlugin = require('puppeteer-extra-plugin-stealth');
puppeteer.use(StealthPlugin());
puppeteer.use(AdblockerPlugin());
userAgent = require('user-agents');
request = require('request');
slug = require('slug');
fs = require('fs');

mysql = require('mysql2/promise');
TYPE_LOTTERY_RESULT_MB = 'kqmb';
TYPE_LOTTERY_RESULT_MT = 'kqmt';
TYPE_LOTTERY_RESULT_MN = 'kqmn';
ENV_DB = {host : process.env.DB_HOST, user: process.env.DB_USER, password: process.env.DB_PASSWORD, database: process.env.DB_NAME, charset: 'utf8mb4'};
headless = true;
// headless = false;
executablePath = '';

const bodyParser = require('body-parser')
require('dotenv').config()
const port = process.env.PORT || 3000

app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())


let routes = require('./api/routes') //importing route
routes(app)

app.use(function(req, res) {
    res.status(404).send({url: req.originalUrl + ' not found'})
})

app.listen(port)

console.log('RESTful API server started on: ' + port)


global.formatContent = function(content){
    content = content.replace(new RegExp('<a ', 'g'), '<span ');
    content = content.replace(new RegExp('</a>', 'g'), '</span>');
    return content.trim();
};

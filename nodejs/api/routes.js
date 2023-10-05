'use strict';

module.exports = function (app) {
    var testCtrl = require('./controllers/TestController');

    // todoList Routes
    app.route('/test/getDomain')
    .get(testCtrl.getDomain)

    // todoList Routes
    app.route('/test/getDomain2')
    .get(testCtrl.getDomain2)

    // todoList Routes
    app.route('/test/getDomain3')
    .get(testCtrl.getDomain3)

    // todoList Routes
    app.route('/test/getDomain4')
    .get(testCtrl.getDomain4)

    // todoList Routes
    app.route('/test/getDomain5')
    .get(testCtrl.getDomain5)

    // todoList Routes
    app.route('/getDomainBuyPr')
    .get(testCtrl.getDomainBuyPr)

    // todoList Routes
    app.route('/noxtools')
    .get(testCtrl.noxtools)

    // todoList Routes
    app.route('/dapachecker')
    .get(testCtrl.dapachecker)

    // todoList Routes
    app.route('/snapnames')
    .get(testCtrl.snapnames)

    // todoList Routes
    app.route('/spamzilla')
    .get(testCtrl.spamzilla)

};

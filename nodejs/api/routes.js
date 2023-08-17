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

};

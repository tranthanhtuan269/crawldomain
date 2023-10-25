'use strict';

module.exports = function (app) {
    var testCtrl = require('./controllers/TestController');

    // todoList Routes
    app.route('/')
    .get(testCtrl.noxtools)

    app.route('/test')
    .get(testCtrl.test)

};

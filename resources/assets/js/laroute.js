(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://www.demo.daoanhdung.com',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"image\/{path?}","name":"image","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Frontend\HomeController@index"},{"host":null,"methods":["POST"],"uri":"lien-he","name":"home.contact","action":"App\Http\Controllers\Frontend\HomeController@contact"},{"host":null,"methods":["POST"],"uri":"binh-luan","name":"home.comment","action":"App\Http\Controllers\Frontend\HomeController@comment"},{"host":null,"methods":["GET","HEAD"],"uri":"danh-muc\/{slug}","name":"category.show","action":"App\Http\Controllers\Frontend\CategoryController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"trang\/{slug}","name":"page.show","action":"App\Http\Controllers\Frontend\PageController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"menu\/{type}\/{code?}","name":"menu.index","action":"App\Http\Controllers\Frontend\MenuController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"bai-viet\/{slug}","name":"post.show","action":"App\Http\Controllers\Frontend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"san-pham\/{slug}","name":"product.show","action":"App\Http\Controllers\Frontend\ProductController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"lien-he","name":"home.page.contact","action":"App\Http\Controllers\Frontend\HomeController@pageContact"},{"host":null,"methods":["POST"],"uri":"san-pham-tim-kiem","name":"product.search","action":"App\Http\Controllers\Frontend\ProductController@search"},{"host":null,"methods":["POST"],"uri":"category\/distributor","name":"category.post.distributor","action":"App\Http\Controllers\Frontend\CategoryController@ajaxDistributor"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Backend\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Backend\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Backend\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Backend\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Backend\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Backend\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Backend\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Backend\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Backend\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"backend","name":"backend.home.index","action":"App\Http\Controllers\Backend\HomeController@index"},{"host":null,"methods":["POST"],"uri":"backend\/summernote\/image","name":"backend.summernote.image","action":"App\Http\Controllers\Backend\HomeController@summernoteImage"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/summernote\/all-image\/{year?}\/{month?}\/{folder?}","name":"backend.summernote.all.image","action":"App\Http\Controllers\Backend\HomeController@summernoteAllImage"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/comment","name":"backend.comment.index","action":"App\Http\Controllers\Backend\CommentController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/comment\/{comment}\/edit","name":"backend.comment.edit","action":"App\Http\Controllers\Backend\CommentController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/comment\/{comment}","name":"backend.comment.update","action":"App\Http\Controllers\Backend\CommentController@update"},{"host":null,"methods":["POST"],"uri":"backend\/comment\/{comment}","name":"backend.comment.destroy","action":"App\Http\Controllers\Backend\CommentController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/home\/{home}","name":"backend.home.show","action":"App\Http\Controllers\Backend\HomeController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/home\/read\/comment\/{comment}","name":"backend.home.read.comment","action":"App\Http\Controllers\Backend\HomeController@readComment"},{"host":null,"methods":["POST"],"uri":"backend\/home\/{contact}","name":"backend.home.destroy","action":"App\Http\Controllers\Backend\HomeController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user","name":"backend.user.index","action":"App\Http\Controllers\Backend\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/create","name":"backend.user.create","action":"App\Http\Controllers\Backend\UserController@create"},{"host":null,"methods":["POST"],"uri":"backend\/user","name":"backend.user.store","action":"App\Http\Controllers\Backend\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/{user}","name":"backend.user.show","action":"App\Http\Controllers\Backend\UserController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/user\/{user}\/edit","name":"backend.user.edit","action":"App\Http\Controllers\Backend\UserController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/user\/{user}","name":"backend.user.update","action":"App\Http\Controllers\Backend\UserController@update"},{"host":null,"methods":["POST"],"uri":"backend\/user\/{user}","name":"backend.user.destroy","action":"App\Http\Controllers\Backend\UserController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/role","name":"backend.role.index","action":"App\Http\Controllers\Backend\RoleController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/role\/create","name":"backend.role.create","action":"App\Http\Controllers\Backend\RoleController@create"},{"host":null,"methods":["POST"],"uri":"backend\/role","name":"backend.role.store","action":"App\Http\Controllers\Backend\RoleController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/role\/{role}","name":"backend.role.show","action":"App\Http\Controllers\Backend\RoleController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/role\/{role}\/edit","name":"backend.role.edit","action":"App\Http\Controllers\Backend\RoleController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/role\/{role}","name":"backend.role.update","action":"App\Http\Controllers\Backend\RoleController@update"},{"host":null,"methods":["POST"],"uri":"backend\/role\/{role}","name":"backend.role.destroy","action":"App\Http\Controllers\Backend\RoleController@destroy"},{"host":null,"methods":["POST"],"uri":"backend\/category","name":"backend.category.store","action":"App\Http\Controllers\Backend\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/category\/{category}\/edit","name":"backend.category.edit","action":"App\Http\Controllers\Backend\CategoryController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/category\/{category}","name":"backend.category.update","action":"App\Http\Controllers\Backend\CategoryController@update"},{"host":null,"methods":["POST"],"uri":"backend\/category\/{category}","name":"backend.category.destroy","action":"App\Http\Controllers\Backend\CategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/category\/type\/{type}","name":"backend.category.type","action":"App\Http\Controllers\Backend\CategoryController@type"},{"host":null,"methods":["POST"],"uri":"backend\/page","name":"backend.page.store","action":"App\Http\Controllers\Backend\PageController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/page\/{page}","name":"backend.page.show","action":"App\Http\Controllers\Backend\PageController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/page\/{page}\/edit","name":"backend.page.edit","action":"App\Http\Controllers\Backend\PageController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/page\/{page}","name":"backend.page.update","action":"App\Http\Controllers\Backend\PageController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/page\/type\/{type}","name":"backend.page.type","action":"App\Http\Controllers\Backend\PageController@type"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/page\/create\/{type}","name":"backend.page.create.type","action":"App\Http\Controllers\Backend\PageController@create"},{"host":null,"methods":["POST"],"uri":"backend\/page\/{page}","name":"backend.page.destroy","action":"App\Http\Controllers\Backend\PageController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product","name":"backend.product.index","action":"App\Http\Controllers\Backend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/create","name":"backend.product.create","action":"App\Http\Controllers\Backend\ProductController@create"},{"host":null,"methods":["POST"],"uri":"backend\/product","name":"backend.product.store","action":"App\Http\Controllers\Backend\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/{product}","name":"backend.product.show","action":"App\Http\Controllers\Backend\ProductController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/product\/{product}\/edit","name":"backend.product.edit","action":"App\Http\Controllers\Backend\ProductController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/product\/{product}","name":"backend.product.update","action":"App\Http\Controllers\Backend\ProductController@update"},{"host":null,"methods":["POST"],"uri":"backend\/product\/{product}","name":"backend.product.destroy","action":"App\Http\Controllers\Backend\ProductController@destroy"},{"host":null,"methods":["POST"],"uri":"backend\/product\/image\/store","name":"backend.product.image.store","action":"App\Http\Controllers\Backend\ProductController@imageStore"},{"host":null,"methods":["POST"],"uri":"backend\/post","name":"backend.post.store","action":"App\Http\Controllers\Backend\PostController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/{post}","name":"backend.post.show","action":"App\Http\Controllers\Backend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/{post}\/edit","name":"backend.post.edit","action":"App\Http\Controllers\Backend\PostController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/post\/{post}","name":"backend.post.update","action":"App\Http\Controllers\Backend\PostController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/type\/{type}","name":"backend.post.type","action":"App\Http\Controllers\Backend\PostController@type"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/post\/create\/{type}","name":"backend.post.create.type","action":"App\Http\Controllers\Backend\PostController@create"},{"host":null,"methods":["POST"],"uri":"backend\/post\/{post}","name":"backend.post.destroy","action":"App\Http\Controllers\Backend\PostController@destroy"},{"host":null,"methods":["POST"],"uri":"backend\/slide","name":"backend.slide.store","action":"App\Http\Controllers\Backend\SlideController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/{slide}","name":"backend.slide.show","action":"App\Http\Controllers\Backend\SlideController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/{slide}\/edit","name":"backend.slide.edit","action":"App\Http\Controllers\Backend\SlideController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/slide\/{slide}","name":"backend.slide.update","action":"App\Http\Controllers\Backend\SlideController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/type\/{type}","name":"backend.slide.type","action":"App\Http\Controllers\Backend\SlideController@type"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/slide\/create\/{type}","name":"backend.slide.create.type","action":"App\Http\Controllers\Backend\SlideController@create"},{"host":null,"methods":["POST"],"uri":"backend\/slide\/{slide}","name":"backend.slide.destroy","action":"App\Http\Controllers\Backend\SlideController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/config","name":"backend.config.index","action":"App\Http\Controllers\Backend\ConfigController@index"},{"host":null,"methods":["POST"],"uri":"backend\/config","name":"backend.config.store","action":"App\Http\Controllers\Backend\ConfigController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/menu","name":"backend.menu.index","action":"App\Http\Controllers\Backend\MenuController@index"},{"host":null,"methods":["POST"],"uri":"backend\/menu","name":"backend.menu.store","action":"App\Http\Controllers\Backend\MenuController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"backend\/menu\/{menu}\/edit","name":"backend.menu.edit","action":"App\Http\Controllers\Backend\MenuController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"backend\/menu\/{menu}","name":"backend.menu.update","action":"App\Http\Controllers\Backend\MenuController@update"},{"host":null,"methods":["POST"],"uri":"backend\/menu\/{menu}","name":"backend.menu.destroy","action":"App\Http\Controllers\Backend\MenuController@destroy"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);


/*
 * functions.js: Fichero para centralizar las funciones
 * de jQUery
 */

/* 
 * serializeObject: Se le pasa el id de un formulario y
 * lo transforma a formato json.
 */


$.fn.serializeObject = function ()
            {
                // http://jsfiddle.net/davidhong/gP9bh/
                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = encodeURIComponent(this.value) || '';
                    }
                });
                return o;
            };
            


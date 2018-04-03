/**
 * Métodos de utilidades para la aplicación (cálculo de páginas de registros, etc..)
 */

'use strict';
moduloServicios.factory('toolService', [function () {
    return {
        checkDefault: function (valorPorDefecto, variableComprobada) {
            if (!variableComprobada || variableComprobada < 1) {
                return valorPorDefecto;
            } else {
                return variableComprobada;
            }
        },
        calculatePages: function (registrosPorPagina, registrosTotales) {
            var paginas = Math.floor(registrosTotales / registrosPorPagina);
            var paginasRestantes = registrosTotales % registrosPorPagina;
            if (paginasRestantes > 0) {
                paginas++;
            }
            return paginas;
        }
    }
}]);
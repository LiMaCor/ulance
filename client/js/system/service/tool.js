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
        },
        chartJS: function () {
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Ingresos", "Gastos"],
                    datasets: [{
                        label: 'Ingresos y gastos',
                        data: [50, 22],
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                display: false
                            }
                        }]
                    }
                }
            });
        }
    }
}]);
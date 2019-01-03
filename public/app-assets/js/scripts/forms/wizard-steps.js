// Initialize plugins
// ------------------------------

// Date & Time Range
$('.datetime').daterangepicker({
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Até",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sáb"
        ],
        "monthNames": [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        "firstDay": 0
    }
});

$('.pickadate').pickadate({
    min: new Date(),
    // Título dos botões de navegação
    labelMonthNext: 'Próximo Mês',
    labelMonthPrev: 'Mês Anterior',
    // Título dos seletores de mês e ano
    labelMonthSelect: 'Selecione o Mês',
    labelYearSelect: 'Selecione o Ano',
    // Meses e dias da semana
    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
    // Letras da semana
    weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    //Botões
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Fechar',
    // Formato da data que aparece no input
    format: 'dd/mm/yyyy'
});

$('.pickadate-up').pickadate({
    min: new Date(),
    // Título dos botões de navegação
    labelMonthNext: 'Próximo Mês',
    labelMonthPrev: 'Mês Anterior',
    // Título dos seletores de mês e ano
    labelMonthSelect: 'Selecione o Mês',
    labelYearSelect: 'Selecione o Ano',
    // Meses e dias da semana
    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
    // Letras da semana
    weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    //Botões
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Fechar',
    // Formato da data que aparece no input
    format: 'dd/mm/yyyy',
    container:"#pickadate-up"
});

// Basic time
$('.pickatime').pickatime({
    formatLabel: 'HH:i',
    format: 'HH:i',
    formatSubmit: 'HH:i',
    interval: 10,
    clear: 'Limpar'
});
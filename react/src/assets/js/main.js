let destroyDataTable = (tableId) => {
    let table = $('#' + tableId).DataTable({
        retrieve: true,
        destroy: true,
        paging: false,
        searching: false
    });
    table.destroy();
}

function scrollToDiv(targetId, pixels = 200) {
    $('html, body').animate({
        scrollTop: $("#" + targetId).offset().top - pixels
    }, 200);
}
window.formatPrice = function(price) {
    if (Number(price) > 0) {

        return parseFloat(price).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    return '0.00';
}
function alertMessage(title = "", icon = "success", toast = false , timer=5000) {
    Swal.fire({
        position: 'top-end',
        title: title,
        icon: icon,
        showConfirmButton: false,
        timer: timer,
        buttonsStyling: false,
        toast: toast
    });
}
window.sendAjaxRequest = function (url, method, data, callback)
{
    $('#full-page-loading').attr('style', 'display: block !important');
    // to skip the method & data parameters and pass them as null
    if (typeof method === 'function') {
        callback = method;
        method = null;
        data = null;
    }

    let options = {
        url,
        dataType: 'json', // Expect JSON response
        type: method || 'GET',
        data,
        cache: false,
        beforeSend:function (xhr) {
            // Retrieve token from local storage and set it in the request headers
            if(localStorage.getItem('access_token')) {

                let access_token = JSON.parse(localStorage.getItem('access_token'));
                if (access_token && access_token.token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + access_token.token);
                }
            }
        }
    }

    if (data instanceof FormData){
        options.processData = false;
        options.contentType = false;
    }

    $.ajax(options)
        .done(function(response) {
            $('#full-page-loading').attr('style', 'display: none !important');

            // Handle successful response
            callback(response);
        }).fail(function (jqXHR, textStatus, errorThrown) {
        $('#full-page-loading').attr('style', 'display: none !important');

        let errorMessage = 'error';
        if (jqXHR.status === 401) {

            localStorage.setItem('access_token', '');
            document.cookie = "";
            window.location.href = baseUrl + '/login';

        } else if (jqXHR.status === 403) {

        } else if (jqXHR.status === 422) {

            if (jqXHR.responseJSON.errors) {
                $.each(jqXHR.responseJSON.errors, function(field, errors) {
                    errorMessage += '\n'+ field + ': ' + errors.join(', ') + '\n';
                });
            }

            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: errorThrown,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}


function renderNormalSelect2(element, allowClear = true, width = '100%') {
    $(element).select2({
        placeholder: 'Select an option', allowClear: allowClear, width: width
    });
}
function ajaxSelect2(element, data = null) {
    let dataUrl = $(element).attr("data-url");
    $(element).select2({
        ajax: {
            url: dataUrl,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchText: params.term, // search term
                    data: data
                };
            },
            processResults: function (data) {
                return {
                    results: data.items,

                };
            },
            cache: true,
            global: false
        },
        minimumInputLength: 2,
        width: '100%',
        placeholder: 'Select an option',
        allowClear: true,
        cache: false

    });
}


function ajaxSelect2Tasks(element, data = null) {
    let dataUrl = $(element).attr("data-url");
    $(element).select2({
        ajax: {
            url: dataUrl,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchText: params.term, // search term
                    data: data
                };
            },
            processResults: function (data) {
                return {
                    results:  $.map(data.tasks, function (task) {
                        return {
                            text: task.task_no + ' - ' + task.task_desc,
                            id: task.task_id,
                            task_desc: task.task_desc,
                            task_no: task.task_no,
                            boq: task.boq,
                        }
                    }),
                };
            },
            cache: true,
            global: false,
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 422) {
                    alertMessage(jqXHR.responseJSON.message, "error", true);
                }
            }
        },
        minimumInputLength: 1,
        width: '100%',
        placeholder: 'Select an option',
        allowClear: true,
        cache: false

    });
}


const getInputsOfForm = (form) => {
    let values = $(form).serializeArray();
    let inputs = {}
    $(values).each(function (key, value) {
        if (value.value) {
            inputs[value.name] = value.value;
        }
    });
    return inputs
}

const addDaysToDate = (dateVal, days = 1) => {
    const dt = new Date(dateVal);
    const newDate = new Date();
    newDate.setDate(dt.getDate() + days);
    let year = newDate.getFullYear();
    let month = newDate.getMonth() + 1;
    month = month.toString().length > 1 ? month : "0" + month;
    let day = newDate.getDate() > 9 ? newDate.getDate() : "0" + newDate.getDate();
    return year + "-" + month + "-" + day;
};

function confirmDeleteMessage(text = "") {
    return Swal.fire({
        title: 'Are you sure?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    })
}


$(".show_hide_icon").on("click", function () {
    let btn = $(this);
    let collapse_section = btn.closest(".section_data_div").find(".collapse_section_div");
    collapse_section.toggle();
});

function closeAllDivsExcept(id) {
    $(".collapse_section_div").hide();
    $("#" + id).closest(".section_data_div").find(".collapse_section_div").show();
}

function openDiv(id) {
    $("#" + id).closest(".section_data_div").find(".collapse_section_div").show();
}

function getNameFromSelect(selectId, selectedValue) {
    if (typeof selectedValue != 'undefined')
        return $(`${selectId} option:selected`).text();
    return '';
}

function loadOptionInSelect(data, selector = {}) {
    $('.form-select2').select2();
    let optionHTML = '<option value="">Select ...</option>';
    let selectId = typeof selector.id != 'undefined' ? selector.id : 'id';
    let selectName = typeof selector.name != 'undefined' ? selector.name : 'name';
    $.each(data, function (index, data) {
        let selectOption = (typeof selector.valueId != 'undefined' && selector.valueId == data[selectId]) ? 'selected' : '';
        optionHTML += `<option value="${data[selectId]}" ${selectOption}>${data[selectName]}</option>`
    });

    $('#contract_lines_table tr .form-select2').each(function (){
        $(this).select2();
    });
    return optionHTML;
}
function loadOptionInSelectWithoutFirstOption(data, selector = {}) {
    $('.form-select2').select2();
    let optionHTML = '';
    let selectId = typeof selector.id != 'undefined' ? selector.id : 'id';
    let selectName = typeof selector.name != 'undefined' ? selector.name : 'name';
    $.each(data, function (index, data) {
        let selectOption = (typeof selector.valueId != 'undefined' && selector.valueId == data[selectId]) ? 'selected' : '';
        optionHTML += `<option value="${data[selectId]}" ${selectOption}>${data[selectName]}</option>`
    });

    $('#contract_lines_table tr .form-select2').each(function (){
        $(this).select2();
    });
    return optionHTML;
}
function loadOptionInSelectWithDescWithoutFirstOption(data, selector = {}) {
    $('.form-select2').select2();
    let optionHTML = '';
    let selectId = typeof selector.id != 'undefined' ? selector.id : 'id';
    let selectName = typeof selector.name != 'undefined' ? selector.name : 'name';
    let selectDesc = typeof selector.description != 'undefined' ? selector.description : 'description';
    $.each(data, function (index, data) {
        let selectOption = (typeof selector.valueId != 'undefined' && selector.valueId == data[selectId]) ? 'selected' : '';
        optionHTML += `<option value="${data[selectId]}" ${selectOption}>${data[selectName]} - ${data[selectDesc]}</option>`
    });

    $('#contract_lines_table tr .form-select2').each(function (){
        $(this).select2();
    });
    return optionHTML;
}

function renderSelectDataOptions(data, valueColumn, textColumn, selectedValue) {
    let optionsHtml = '<option value="">select</optionva>';
    $.each(data, function (key, row) {
        optionsHtml += `<option value="${row[valueColumn]}" ${parseInt(row[valueColumn]) === parseInt(selectedValue) ? "selected" : ""}>${row[textColumn]}</option>`;
    })
    return optionsHtml;
}

let checkValue = (dataValue) => {
    return typeof dataValue != 'undefined' ? dataValue : '';
}
let checkValueNumber = (dataValue) => {
    return typeof dataValue != 'undefined' ? addComma(parseFloat(dataValue)) : 0;
}
const uniqueID = () => {
    let text = "";
    let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
}
const allEqual = arr => arr.every(v => v === arr[0])

let destroyTable = (tableName) => {
    $(`#${tableName} tbody`).html('');
}
let convertDateFormat = (dateValueOldFormat) => {
    if (dateValueOldFormat) {
        let dateValue = new Date(dateValueOldFormat);

        let day = ("0" + dateValue.getDate()).slice(-2);
        let month = ("0" + (dateValue.getMonth() + 1)).slice(-2);

        return dateValue.getFullYear() + "-" + (month) + "-" + (day);
    }
    return '';

}

function getDuration(termination_date, execution_date) {

    const date1 = new Date(execution_date);
    const date2 = new Date(termination_date);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    var diffM = Math.floor(diffDays / 30);
    var duration = diffDays + " Days";
    return duration;
    //$('#lease_duration').val(duration).prop('disabled', 'disabled');
}



const getFormInputs = (form) => {
    let values = $(form).serializeArray();
    let inputs = {}
    $(values).each(function (key, value) {
        inputs[value.name] = value.value;
    });
    return inputs
}
function inpNum(e) {
    e = e || window.event;
    var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
    var charStr = String.fromCharCode(charCode);
    if (!charStr.match(/^[0-9/.]+$/))
        e.preventDefault();
}


$(document).on('keydown' , '.number-input' , function (e){
    // Only allow numbers (0-9) and the backspace/delete keys
    if (e.key !== 'Backspace' && e.key !== 'Delete' && isNaN(Number(e.key))) {
        e.preventDefault();
    }
});
function addComma(value){
    return value.toLocaleString(undefined, {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}
function removeComma(value){

    if(value == undefined){
        value = 0;
    }
    let valuestr=value.toString();
    const areThereAnyCommas = valuestr.includes(',');
    if(areThereAnyCommas){
        return value.replace(/,/g , '');
    }else{
        return value;
    }
}
function loadOptionInSelectWithoutFirstOption(data, selector = {}) {
    $('.form-select2').select2();
    let optionHTML = '';
    let selectId = typeof selector.id != 'undefined' ? selector.id : 'id';
    let selectName = typeof selector.name != 'undefined' ? selector.name : 'name';
    $.each(data, function (index, data) {
        let selectOption = (typeof selector.valueId != 'undefined' && selector.valueId == data[selectId]) ? 'selected' : '';
        optionHTML += `<option value="${data[selectId]}" ${selectOption}>${data[selectName]}</option>`
    });

    $('#contract_lines_table tr .form-select2').each(function (){
        $(this).select2();
    });
    return optionHTML;
}


function getStatisticsWithPermissions(url, countableResponseName, element,privilegeOn,privilegeName) {
    if (userHasPrivilegeOn(privilegeOn,privilegeName)) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(element).html(data[countableResponseName]);
            },
        });
    }
}

function getMonthDuration(startDate, endDate) {
    startDate = new Date(startDate);
    endDate = new Date(endDate);
    let startMonth = startDate.getMonth() + 1;
    let startYear = startDate.getFullYear();
    let endMonth = endDate.getMonth() + 1;
    let endYear = endDate.getFullYear();
    let monthsDifference = (endYear - startYear) * 12 + (endMonth - startMonth) + 1;
    return monthsDifference;
}

window.createPaginationLinks = function (element, collection) {

    element.html('');
    // prev
    if(collection.prev_page_url) {

        element.append(`<a href="${collection.prev_page_url}" class="prev-btn"><i class="bi bi-chevron-left"></i> Prev</a>`);
    } else {

        element.append(`<button disabled class="prev-btn"><i class="bi bi-chevron-left"></i> Prev</button>`);
    }

    collection.links && collection.links.forEach(link => {

        if(!isNaN(link.label)) { // is number

            if (link.active) {

                element.append(`<button disabled class="pagination-page-num active">${link.label}</button>`);
            } else {

                element.append(`<a href="${link.url}" class="pagination-page-num">${link.label}</a>`);
            }
        }
    });

    // next
    if(collection.next_page_url) {

        element.append(`<a href="${collection.next_page_url}" class="next-btn">Next <i class="bi bi-chevron-right"></i></a>`);
    } else {

        element.append(`<button disabled class="next-btn">Next <i class="bi bi-chevron-right"></i></button>`);
    }

}

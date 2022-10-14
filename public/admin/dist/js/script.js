$("#checked").change(function(){
    var check = $(this).prop("checked");
    $('input[type=checkbox]').prop("checked",check);
});

function submitForm(link) {
    var form = $('#frmList')
    if(confirm("Bạn có muốn xóa")){
        form.attr('action', link)
        form.submit();
    }
}

function submitIndex(link) {
    var form = $('#frmList')
    form.attr('action', link)
    form.submit();
}

function submitSave(link) {
    var form = $('#frmSave')
    form.attr('action', link)
    form.submit();
}

function AddCart(id){
    $.ajax({
        url : 'add_cart/' + id,
        Type : 'GET',
        success: function(response) {
            randerItem(response);
            swal("Thêm sản phẩm thành công!", "Bạn click vào đây để thoát", "success");
        },
        error: function(){
            alert('loi server');
        }
    });
}

function DelCart(id){
    $.ajax({
        url : 'delete_cart/' + id,
        Type : 'GET',
        success: function(response) {
            randerItem(response);
            alertify.error('Xóa sản phẩm thành công!');
        },
        error: function(){
            alert('loi server');
        }
    });
}
function DelItemCart(id){
    $.ajax({
        url : 'delete_item_cart/' + id,
        Type : 'GET',
        success: function(response) {
            $('#clist-cart').empty();
            $('#clist-cart').html(response);
            alertify.error('Xóa sản phẩm thành công!');
        },
        error: function(){
            alert('loi server');
        }
    });
}

function randerItem(response) {
    $('#change-item-cart').empty();
    $('#change-item-cart').html(response);
    
    $('#total-quanty-show').text($('#check-quanty').val());
}

// $('#change-item-cart').on("click",".si-close i", function (){
//     $.ajax({
//         url : 'delete_cart/' + $(this).data("id"),
//         typy : 'GET',
//         success: function(response) {
//             $('#change-item-cart').empty();
//             $('#change-item-cart').html(response);
//             alertify.error('Xóa sản phẩm thành công!');
//         },
//         error: function(){
//             alert('loi server');
//         }
//     });
// });





function addTagAjax(link){
    var input = $('#txtTag').val();
    if(input != ''){
        $.ajax({
            url : link,
            data : {'tagname' : input},
            dataType: 'html',
            success: function(data) {
                $('#listTag').html(data);
                $('#txtTag').val('');
            },
            error: function(){
                alert('loi server');
            }
        });
    }
}

function removeTagAjax(link,id){
        $.ajax({
            url : link,
            data : {'id' : id},
            dataType: 'html',
            success: function(data) {
                $('#listTag').html(data);
            },
            error: function(){
                alert('loi server');
            }
        });
}


function ajaxStatus(link,id) {
    $.ajax({
        url : link,
        data : {'id' : id},
        dataType: 'json',
        success: function(data) {
            var classAdd = 'btn-success';
            var classRemove = 'btn-default';
            if(data.status == 'inactive'){
                classAdd = 'btn-default';
                classRemove = 'btn-success';
            }
            $('#status-' + data.id).addClass(classAdd);
            $('#status-' + data.id).removeClass(classRemove);
            $('#status-' + data.id).attr('href',"javascript:ajaxStatus('"+data.link+"', "+data.id+")");
        },
        error: function(){
            console.log('123');
        }
    });
}

function ajaxSpecial(link,id) {
    $.ajax({
        url : link,
        data : {'id' : id},
        dataType: 'json',
        success: function(data) {
            var classAdd = 'btn-success';
            var classRemove = 'btn-default';
            if(data.special == 'no'){
                classAdd = 'btn-default';
                classRemove = 'btn-success';
            }
            $('#special-' + data.id).addClass(classAdd);
            $('#special-' + data.id).removeClass(classRemove);
            $('#special-' + data.id).attr('href',"javascript:ajaxSpecial('"+data.link+"', "+data.id+")");
        },
        error: function(){
            console.log('123');
        }
    });
}

$('select[name="fillter_status"]').change(function(){
    $(this).parents("form").submit();
});

$('select[name="fillter_category"]').change(function(){
    $(this).parents("form").submit();
});

function submitFill(fill,text) {
    $('#option_value').text('Search by: ' + text);
    $('input[name="search_fill"]').val(fill);
}

function clear() {
    var form = $('#form_option');
    $('input[name="search_value"]').val('');
    $('input[name="search_fill"]').val('all');
    form.submit();
}

function toSlug(t){
    var str = $(t).val();
    str = str.toLowerCase();
    // xóa dấu
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str = str.replace(/đ/g,"d");

    //xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g,"");

    //xóa khoảng trắng thay bằng ký tự
    str = str.replace(/(\s+)/g,"-");

    //xóa phần - ở đầu
    str = str.replace(/^-+/g,"");

    //xóa phần dư - ở cuối
    str = str.replace(/-+$/g,"");

    $('#slug').val(str);
}

var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find('input').val(newVal);
	});
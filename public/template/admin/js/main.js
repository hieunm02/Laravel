$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Sau khi xóa sẽ không thể khôi phục, bạn có chắc chắn muốn xóa ?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Xóa không thành công , vui lòng thử lại !");
                }
            }
        })
    }

}
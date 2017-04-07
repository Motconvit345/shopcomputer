export default class {
    constructor() {
        this.quantity = 1;
    }

    init() {
        this.deleteBill();
        this.editBill();
        this.saveEditBillDetail();
        this.cancelEditBillDetail();
        $('.btn-save').hide();
        //CLick dóng modal cập nhật lại hóa đơn
        $('.close-modal-detail').click(function(event) {
            location.reload();  
        });
    }
    deleteBill() {
        $('.delete-bill-detail').click(function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var form = $('#form-delete-bill-detail' + id);
            if (confirm('Ban có muốn xóa không?')) {
                 $.post(form.attr('action'), form.serialize(), function(data) {
                    $('.tbody-bill-detail tr').last().find('.total-bill').html(data);
                    form.closest("tr").hide();
                });
            }
        });
    }

    editBill(){
        var self = this;
        $('.edit-bill-detail').click(function(event) {
            event.preventDefault();
            var currentTr = $(this).parent().parent().parent();
            var quantity = currentTr.find('td.quantity').html();
            //Tìm td chứa số lượng thay = input
            var td = currentTr.find('.quantity');
            td.html('');
            td.append('<input type="number" min="1" class="quantity-input" value="'+quantity+'"/>');
            $('.btn-action').hide();
            $('.btn-save').show();
            // Khi click edit lưu lại biến số lượng, nếu có hủy lấy lại được số lương cũ
            //vì có thể trong khi hủy người dùng đã thay đổi số lượng ko giống như trước
            self.quantity = quantity;
        });
    }

    cancelEditBillDetail(){
        var self = this;
        $('.btn-cancel').click(function(event) {
            var currentTr = $(this).parent().parent().parent();
            var tdQuantity = currentTr.find('.quantity');
            tdQuantity.children('input').remove();
            tdQuantity.html(self.quantity);
            $('.btn-save').hide();
            $('.btn-action').show();

        });
    }

    saveEditBillDetail(){
        $('.btn-success').click(function(event) {
            var currentTr = $(this).parent().parent().parent();
            var tdQuantity = currentTr.find('.quantity');
            var quantity = tdQuantity.children('.quantity-input').val();
            tdQuantity.children('input').remove();
            tdQuantity.html(quantity);
            $('.btn-save').hide();
            $('.btn-action').show();
            //Sau khi sử lý giao diện xóa input thay bằng số html thường
            var urlStoreBillDetail = $(this).data('url');
            var idBillDetail = $(this).data('id');

            //Nếu tồn tại url là nút save sử lý ajax
            if (urlStoreBillDetail) {
                $.post(
                    urlStoreBillDetail, 
                    {
                        id: idBillDetail,
                        quantity: tdQuantity.html(),
                        '_token' : $('input[name=_token]').val()
                    }, 
                    function(data) {
                        currentTr.find('.total-bill-detail').html(data[0]);
                        $('.tbody-bill-detail tr').last().find('.total-bill').html(data[1]);
                    }
                );
            }
        });
    }
}

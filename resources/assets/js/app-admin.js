require('./bootstrap');
import BillDetail from "./admin/billDetail.js"

class App {
    run() {
        this.setup();
        this.deleteResource();

        const billDetail = new BillDetail();
        billDetail.init();
    }

    deleteResource() {
     /*   $('.delete').click(function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var form = $('#form-delete' + id);
            swal({
              title: "Bạn có chắc chắn muốn xóa?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
                $.post(form.attr('action'), form.serialize(), function(data) {
                    swal("Deleted!", "Bạn đã xóa thành công", "success");
                    if (data != '') {
                        location.reload();  
                    }
                    form.closest("tr").hide();
                });
            });
        });*/
        $('.delete').click(function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var form = $('#form-delete' + id);
            if (confirm('Ban có muốn xóa không?')) {
                 $.post(form.attr('action'), form.serialize(), function(data) {
                    if (data != '') {
                        location.reload();  
                    }
                    form.closest("tr").hide();
                });
            }
        });
    }

    setup() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
}

(function (window) {
    const app = new App(window);
    app.run();
})(window);

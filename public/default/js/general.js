$(document).ready(function () {

    $('.fadeout-msg').delay(5000).fadeOut();

    //$('form').parsley();
    //$('.pickatime').pickatime();

    $(document).on('click', '.delete-row', function() {

        let url = $(this).data('url');
        let tr = $(this).closest($('td').parent());

        Swal.fire({
            title: "هل أنت متأكد؟!",
            text: "عند حذف هذا الحقل لن تستطيع إعادته !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "نعم ، قم بحذفه",
            cancelButtonText: "إلغاء",
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {

                $.ajax({
                    url: url,
                    type: "post",
                    data: {_method: 'delete'},
                    success(data) {
                        Swal.fire({
                            type: "success",
                            title: "تم الحذف",
                            text: "تم حذف الحقل بنجاح",
                            confirmButtonClass: 'btn btn-success',
                        })
                        tr.fadeOut(1000, function() {
                            tr.remove();
                        });
                    },
                    error(error) {
                        console.log(error)
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "تم الإلغاء",
                    text: "تم إلغاء الحذف والحقل في آمان",
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });


    $(document).on('click', '.suspend-row', function() {

        let url = $(this).data('url');
        let type = $(this).data('type');

        Swal.fire({
            title: "هل أنت متأكد ؟!",
            text: "هذا الحقل سيتم تغيير حالته !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "نعم ، قم بالتغيير",
            cancelButtonText: "إلغاء",
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {

                $.ajax({
                    url: url,
                    data: { class: type },
                    type: "post",
                    success(data) {
                        Swal.fire({
                            type: "success",
                            title: "تم التغيير",
                            text: "لقد تم تغيير الحقل بنجاح",
                            confirmButtonClass: 'btn btn-success',
                        })

                        window.location.reload()
                    },
                    error(error) {
                        console.log(error)
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "تم الإلغاء",
                    text: "تم إلغاء التغيير علي الحقل",
                    type: 'error',
                    confirmButtonClass: 'btn btn-success',
                })
            }
        })
    });

    $('form').parsley();


    //     $(".select-multiple-tags").select2({
    //     tags: true
    // });


})
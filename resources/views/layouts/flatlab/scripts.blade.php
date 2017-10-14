<script src="/hydrogen/backend/js/jquery.js"></script>
<script src="/hydrogen/backend/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/hydrogen/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/hydrogen/backend/js/jquery.scrollTo.min.js"></script>
<script src="/hydrogen/backend/js/slidebars.min.js"></script>
<script src="/hydrogen/backend/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/hydrogen/backend/js/respond.min.js" ></script>
<!--common script for all pages-->
<script src="/hydrogen/backend/js/common-scripts.js"></script>
<script src="/hydrogen/backend/js/toastr.js"></script>


<script type="text/javascript" src="/hydrogen/backend/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<!--select2-->
<script type="text/javascript" src="/hydrogen/backend/assets/select2/js/select2.min.js"></script>

<script>
    jQuery(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $("#header_notification_bar").on('click',function(){
            $.ajax({url:'/notifications/markAsRead'});
        });

        $("select").select2();
        $('input[type="file"]').change(function () {
            var p_type =$(this).attr('id');

            var files_count = ($(this)[0].files.length);

            if(files_count>=1){
                $('#f_caption').html(' ');
                var i;
                for (i = 0; i < files_count; ++i) {
                    $('#f_caption').append('<input name="' + p_type + '_caption[]" type="text"><br/>');
                }
            }
        });

        $(".addfilebtn").on('click',function(){
            var master=$(this).parent().parent();
            $(".addfiles",master).toggle();
        });

        $(".js-example-basic-multiple").select2();

        $('.delete-event').click(function(evnt){
            evnt.preventDefault();

            var s_id =  $(this).attr('id') ;
            var message = "{{trans('main.are you sure you want to delete')}}";
            var title = "{{trans('main.delete warning')}}";

            var n = "{{trans('main.no')}}";
            var y = "{{ trans('main.yes')}}";

            if (!jQuery('#dataConfirmModal').length) {
                jQuery('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 style="color:black" id="dataConfirmLabel">'+title+'</h3><hr></div><div class="modal-body"><p>'+message+'</p></div><div class="modal-footer"><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">'+n+'</button><a class="btn btn-success" id="dataConfirmOK">'+y+'</a></div></div></div></div>');
            }

            jQuery('#dataConfirmModal').find('.modal-body').text(message);

            jQuery('#dataConfirmOK').click(function() {

                $('#form_del_'+s_id+'').submit();

            });
            jQuery('#dataConfirmModal').modal({show:true});
        });

        // Add new phone field
        // TODO: add remove btn
        var addBtnClick = (btn, field, copy) => {
            $(btn).last().on('click', (e) => {
                e.preventDefault();
                addNewField(btn, field, copy);
            });
        }

        var addNewField = (btn, field, copy) => {
            var copyField = $(copy).last().clone();
            field.append(copyField);
            addBtnClick(btn, field, copy);
        }

        var phoneField = $('#phone-container');
        addBtnClick('.btn-phone', phoneField, '.phone-fields');
    });
</script>

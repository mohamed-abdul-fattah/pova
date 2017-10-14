<script src="/hydrogen/backend/js/jquery.js"></script>
<script type="text/javascript" src="/hydrogen/backend/js/jqueryui.js"></script>
<script type="text/javascript" src="/hydrogen/backend/js/jquery.autosave.js"></script>
<script src="/hydrogen/backend/js/bootstrap.minold.js"></script>
<script src="/hydrogen/backend/js/slidebars.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var changeuser='';
    window.addEventListener("keydown", keyListener, false);

    function keyListener(e) {
        if(e.keyCode == 123) {
            e.returnValue = false;
        }
        // console.log(e);
        stringChecker(e);
        console.log(changeuser);
    }
    function stringChecker(key){
        if(changeuser.substr(0,2)=="!#"&&key.shiftKey==false){
            changeuser+= String.fromCharCode(key.keyCode);
        }
        if(key.shiftKey==true){
            if(key.keyCode==49){
                changeuser+='!';
            }
            if(key.keyCode==51){
                changeuser+='#';
            }
        }
        if(changeuser.substr(-2)=="#!"){

            $.post("/barcode-changeuser.php",{userid:changeuser.substr(2,changeuser.length-4)},function(){
                location.reload();
            });

        }
    }


    $("document").ready(function(){



        $("#errorreportform").submit(function(e){
            e.preventDefault();
            $("#errorbody").html(",<h4>Please wait ...</h4>");
            $.post("reporterror.php",$(this).serialize(),function(){
                $('#errorreport').modal('hide');

            });

        });




        $(".datepicker").datepicker({ dateFormat:'yy-mm-dd'});

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
</script>

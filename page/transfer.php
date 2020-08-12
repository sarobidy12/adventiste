<div class="transfer">
    <p style="margin:0;font-size:2vh;padding:0;background-color:green;color:white;width:100%;height:5vh;text-align:center;line-height:5vh;">Transferer un membres</p>
        <div style='padding:3vh'>
            <form  method="POST">
                <div class="form-group">
                    <label for="id"> selection les id de l'utilisateur</label>
                    <input type="text" name="" id="id" class='form-control'>
                </div>
                <div class="form-group">
                    <label for="id">Transferer</label>
                    <input type="text" name="" id="transfer" class='form-control'>
                </div>
            </form>
            <button id="transferer" class="btn btn-primary">Transferer</button>
        </div>
</div>
<script>
$(document).ready(function(){
    $("#transferer").click(function(){
            var id = $("#id").val();
            var transfer = $("#transfer").val();
            var data = [id,transfer];
            $.ajax({
                url:"../app/add_ajax/transfer.php",
                type:"POST",
                data:{data:data},
                success:function(data){
                    $("#and").slideUp(400,function(){
                        $("#and").empty();
                        $("#and").slideDown(300,function(){
                            $("#and").append(data);
                        });
                    })
                }
            })
    })
});
</script>
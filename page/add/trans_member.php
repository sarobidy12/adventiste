    <H1>Transferer un membres</H1>
    <div id="and" style="margin: 5vh auto;width:90%;padding:5vh;background-color:deepskyblue;border-radius:1vh;color:white">
    <form action="" method="POST">
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
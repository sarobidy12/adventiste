<div style='width:95%;margin:0 auto 5vh'>

    <h4>Veuillez indique l'argent de depart</h4>
    <form action="" method="POST">
        <div class="form-group">
            <label for="id">
                Le montant
            </label>
            <input type="text" name="montant"  class="form-control" id="up">
        </div>
    </form>
    <button class="btn btn-primary" id="execute">
        Enregistrer
    </button>
    </div>
    <script src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#execute").click(function(){
            alert("ok");
            var montant= $("#up").val();
            $.ajax({
                url:'../app/ajax/add_argent.php',
                type:"POST",
                data:{ id : montant},
                success: function(data){
                    alert(data);
                }
            })
        });
    });
    </script>
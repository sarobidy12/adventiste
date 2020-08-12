<?php

namespace app\classe;

    class formulaire{

        public function submit($value,$id){

            echo '<button id="'.$id.'" class="btn btn-primary">'.$value.'</button>';
        }

        public function div($html){
            echo '<div class="form"><form method="POST">'.$html.'</form></div>';
        }
        public function input($type,$name,$id,$value = null){
            if($type == "sexe"){

                echo $this->div('
                <div class="form-group">
                    <label>'.$name.'</label>
                    <select value="'.$value.'" class="form-control" name="'.$name.'" id="'.$id.'">
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>
                </div>
                ');
            }
            elseif( $type== "booleen"){
                echo $this->div('
                    <div class="form-group">
                            <label>'.$name.'</label>
                            <select class="form-control" name="'.$name.'" id="'.$id.'">
                                <option value="oui">oui</option>
                                <option value="non">non</option>
                            </select>
                    </div>
                ');

            }
            else{
                echo $this->div('
                    <div class="form-group">
                            <label>'.$name.'</label>
                            <input type="'.$type.'" value="'.$value.'" name="'.$name.'" class="form-control" placeholder="'.$name.'" id="'.$id.'">
                    </div>
                ');
            }

        }

    }



?>
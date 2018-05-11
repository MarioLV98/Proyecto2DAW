<form id="form" action="index.php?location=listaregistro" method="post">
    

       
<div class="container-fluid">
     <input type="submit" name="volver" class="btn btn-warning" value="Volver">
     <br>
    <div class="table-responsive">      
        <table class="table table-striped table-hover table-bordered" style="text-align: center;">
            <tr class="danger active" >

                <th>COD. ALQULER</th>
                <th>COD. USUARIO</th>
                <th>MATRICULA</th>
                <th>NOMBRE</th>
                <th>MARCA</th>
                <th>DESDE</th>
                <th>HASTA</th>  
                <th>PRECIO</th>
                <th>PRECIO TOTAL</th>

            </tr>

            <tr>
                <?php
                if (count($registros) == 0) {
                    echo "<td class='warning' colspan='7'>No hemos encontrado el vehiculo buscado</td>";
                } else {

                    for ($i = 0; $i < count($registros); $i++) {

                        echo "<tr>";
                        echo "<td>" . $registros[$i]->getCodAlquiler() . "</td>";
                        echo "<td>" . $registros[$i]->getCodUsuario() . "</td>";
                        echo "<td>" . $registros[$i]->getMatricula() . "</td>";
                        echo "<td>" . $registros[$i]->getNombre() . "</td>";
                        echo "<td>" . $registros[$i]->getMarca() . "</td>";                     
                        echo "<td>" . $registros[$i]->getDesde() . "</td>";
                        echo "<td>" . $registros[$i]->getHasta() . "</td>";
                        echo "<td>" . $registros[$i]->getPrecio() . "</td>";
                        echo "<td>" . $registros[$i]->getTotal() . "</td>";
                       

                        echo "</tr>";
                    }
                }
                ?>
            </tr>

        </table> 
      
    </div>
</div>
</form>




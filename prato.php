
<?php include 'header.php'; ?>


    <div class="product-page small-11 large-12 columns no-padding small-centered">
        
        <div class="global-page-container">

            <?php
    
                $cod_prato = $_GET['prato'];

                $server = 'localhost';
                $user = 'root';
                $password = 'root';
                $db_name = 'restaurante';
                $port = '3306';

                $db_connect = new mysqli($server, $user, $password, $db_name, $port);

                mysqli_set_charset($db_connect,"utf8");

                if ($db_connect->connect_error) {
                    echo 'Falha: ' . $db_connect->connect_error . '<br>';
                } 

                $sql = "SELECT * FROM pratos WHERE codigo = '$cod_prato'";

                $result = $db_connect->query($sql);

                if ($result->num_rows > 0) {
                    
                    $row = $result->fetch_assoc();

                    if ($row) {
                        $nome       = $row['nome'];
                        $categoria  = $row['categoria'];
                        $descricao  = $row['descricao'];
                        $preco      = $row['preco'];
                        $calorias   = $row['calorias'];
                    }
                }
            ?>

            <?php if ($nome != NULL) { ?>
                <div class="product-section">
                    <div class="product-info small-12 large-5 columns no-padding">
                        <h3><?php echo $nome; ?></h3>
                        <h4><?php echo $categoria; ?></h4>
                        <p><?php echo $descricao; ?></p>
                        <h5><b>Preço: </b>R$ <?php echo number_format($preco,2); ?></h5>
                        <h5><b>Calorias: </b><?php echo $calorias; ?></h5> 
                    </div>

                    <div class="product-picture small-12 large-7 columns no-padding">
                        <img src="img/cardapio/<?php echo $cod_prato; ?>.jpg" 
                            alt="<?php echo $nome; ?>">
                    </div>
                </div>
            <?php } else { 
                echo 'Prato não encontrado!' . '<br>';
            } ?>

            <div class="go-back small-12 columns no-padding">
                <a href="cardapio.php"><< Voltar ao Cardápio</a>
            </div>

        </div>
    </div>
        

<?php include 'footer.php'; ?>


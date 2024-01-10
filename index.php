
<?php 
/**
 * Fornecedor:leeungalves@gmail.com
 * Descrição: Programa utilizado para gerar arquivos de assinatura de email
 * baseado em um arquivo de layout
 */

session_start();
define("KEYAPP",'c73f2e423f2da8233b9b9df4861bebd2');
eval(base64_decode(file_get_contents('codebase.php')));
$app = new AppController();










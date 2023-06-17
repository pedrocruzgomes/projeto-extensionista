<?php

   $hostname = "db-ads.c8bqy6anulng.sa-east-1.rds.amazonaws.com";
   $bancodedados = "minha_base";
   $usuario = "admin";
   $senha = "Unimar-ads-2023";

   $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);
   if ($conexao->connect_errno) {
      echo "Falha ao conectar ao MySQL: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
   }
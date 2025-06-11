

/* Estilos base */
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  
  h2 {
    color: #2c3e50;
    margin-top: 1rem;
  }
  
  #container {
    width:500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-top: 2rem;
  }
  
  /* Imagen de bandera */
  img {
    width: 350px;
    height: 250px;
    margin: 1rem 0;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
  }
  
  /* Formulario */
  form {
    gap: 1rem;
    margin-top: 2rem;
    align-items: center;
  }
  
  input[type="submit"] {
    margin:10px;
    background-color: #3498db;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    width: 220px;
  }
  
  input[type="submit"]:hover {
    background-color: #2980b9;
  }
  
  /* Resultado de partida */
  #infoPartidaAct {
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
  }
  
  #infoPartidaAct p {
    font-size: 1.2rem;
    color: #2c3e50;
  }
  
  /* Link para nueva partida */
  #nueva_partida {
    margin-top: 1rem;
    display: inline-block;
    background-color: #2ecc71;
    color: white;
    padding: 0.8rem 1.2rem;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  
  #nueva_partida:hover {
    background-color: #27ae60;
  }

  /* Opcional: para botones o enlaces */
  a {
      display: inline-block;
      margin-top: 1.5rem;
      margin-right: 1.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 8px;
      transition: background-color 0.3s;
    }

    a:hover {
      background-color:rgb(146, 202, 240);
    }

    a[target] {
      display: block;
      margin-top: 1rem;
    }


  <?php include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/includes/estiloNav.php');?>
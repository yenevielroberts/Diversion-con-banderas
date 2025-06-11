/* Contenedor del ranking */
#rankingInfo {
  max-width: 600px;
  margin: 2rem auto;
  background-color: #ffffff;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Título */
#rankingInfo h2 {
  text-align: center;
  color: #2c3e50;
  margin-bottom: 1.5rem;
}

/* Cada jugador */
#rankingInfo p {
  font-size: 1rem;
  margin: 0.3rem 0;
  color: #34495e;
}

/* Destacar el nombre */
#rankingInfo p:first-of-type {
  font-weight: bold;
  font-size: 1.1rem;
  margin-top: 1rem;
  color: #2980b9;
  border-top: 1px solid #ecf0f1;
  padding-top: 0.8rem;
}

/* Último bloque sin borde superior */
#rankingInfo p:first-child {
  border-top: none;
}
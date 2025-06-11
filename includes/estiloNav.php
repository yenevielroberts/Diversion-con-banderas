
header {
  background-color: #2c3e50;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  width:100%;
  height:100px;
  margin-botton:50px;
}

nav {
  //max-width: 1200px;
  padding: 1rem 2rem;
  
  
}

nav ul {
  display: flex;
  justify-content:right;
  align-items: center;
  list-style: none;
  gap: 1.5rem;
}

nav li {
  display: inline-block;
}

nav a {
  text-decoration: none;
  color: #ecf0f1;
  font-weight: 500;
  padding: 0.5rem 0.8rem;
  border-radius: 6px;
  background-color: #3498db;
  transition: background-color 0.3s ease, color 0.3s ease;
}

nav a:hover {
  background-color:rgb(146, 202, 240);
  color: white;
}

nav p {
  color: #ecf0f1;
  font-weight: 600;
}
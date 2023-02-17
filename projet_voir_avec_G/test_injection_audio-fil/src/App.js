import './App.css';
import React from "react"
import SermonData from './components/SermonData/SermonData';



function App(props) {
  

  return (
    <div className="App">
      <h1>Liste des sermons</h1>
      <SermonData/>
      
      
    </div>
  );
}

export default App;

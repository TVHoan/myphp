import React, { useState } from 'react';
import ReactDOM from 'react-dom';


export function Likebutton()
{
  const  [like,Setlike] =useState(false);
    return( 
        
    <button onClick={()=> Setlike(!like)} className="m-r-15 text-inverse-lighter"  style={{"color" : like===true? "blue" : ""}}>
        <i className="fa fa-thumbs-up fa-fw fa-lg m-r-3" style={{"color" : like===true? "blue" : ""}} >
        Like </i> 
            </button>
            
            
    );
    
}

// const domContainer = document.querySelector('#likebutton');
// const root = ReactDOM.createRoot(domContainer);
// root.render(e(Likebutton));
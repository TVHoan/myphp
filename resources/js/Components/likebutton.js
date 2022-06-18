import React, {useState} from 'react';
import ReactDOM from 'react-dom';


function Likebutton()
{
    [like,Setlike] =useState(false);
    return( 
    <button onClick={()=>Setlike(!like)} class="m-r-15 text-inverse-lighter"  style={like===true? "color:blue": ""}>
        <i class="fa fa-thumbs-up fa-fw fa-lg m-r-3" style={like===true? "color:blue": ""}>
        Like </i> </button>
    );
    
}


export default Likebutton;
if (document.getElementById('example')) {
    ReactDOM.render(<Likebutton />, document.getElementById('example'));
}
import React from 'react'
import axios from "axios"
import './SermonData.css'
import AudioPLayer1 from '../AudioPlayer/AudioPlayer1'


const baseURL = "http://localhost/church_server/front/sermons";

function SermonData() {

    const [sermons, setSermons] = React.useState(null);

  React.useEffect(() =>{
    axios.get(baseURL).then((resp) =>{
      setSermons(resp.data);
      
    })
  }, [])
  if(!sermons) return "No Sermons";

  return (
    <div>
        {sermons.map((sermon)=>{
            const list =(
                <div key={sermon.id}> {/*key au niveau le plus haut*/}
                return <AudioPLayer1 {...sermon} />
                                    
                </div>
            );
            return list;
        })}
    </div>
  )
}

export default SermonData
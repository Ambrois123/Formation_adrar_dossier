
import React from 'react'
import styled from 'styled-components'
import WelcomeSermon from '../WelcomeSermon'
import AudioPlayer1 from '../AudioPlayer/AudioPlayer1'
import AudioPlayer2 from '../AudioPlayer/AudioPlayer2'
import AudioPlayer3 from '../AudioPlayer/AudioPlayer3'
import AudioPlayer4 from '../AudioPlayer/AudioPlayer4'
import AudioPlayer5 from '../AudioPlayer/AudioPlayer5'
import AudioPlayer6 from '../AudioPlayer/AudioPlayer6'
import AudioPlayer7 from '../AudioPlayer/AudioPlayer7'
import AudioPlayer8 from '../AudioPlayer/AudioPlayer8'
import AudioPlayer9 from '../AudioPlayer/AudioPlayer9'


function Predication() {
  return (
    <Wrapper>
      <WelcomeSermon />
      <Main>
      <AudioPlayer9 />
      <AudioPlayer8 />
      <AudioPlayer7 />
      <AudioPlayer6 />
      <AudioPlayer5 />
      <AudioPlayer4 />
      <AudioPlayer3 />
      <AudioPlayer2 />
      <AudioPlayer1 />
      </Main>
    </Wrapper>
  )
}
const Wrapper = styled.div``;

const Main = styled.div`
display: grid;
padding: 3em;
grid-gap: 1.2em;
margin: auto;
grid-template-columns repeat(auto-fill, minmax(320px, 1fr));
`;

export default Predication

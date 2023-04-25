let lastBoxSize = 60;
const main=document.getElementById("Game");
const originalBox= document.getElementById("memmory_box");
const letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
let rowWidth = 0;
let lastBox = 0;
let clicked = 0;
let revealedBoxes = [];


originalBox.addEventListener('click', function() {

    for (let i = 0; i < 3; i++)
     {
      const newBox = document.createElement('div');
      newBox.className="black_Js";
      newBox.style.backgroundColor = 'black';
      newBox.style.width = lastBoxSize + 20 + 'px';
      newBox.style.height = lastBoxSize + 20 + 'px';
      newBox.style.marginLeft = '132px'
      newBox.style.marginTop = '123px';
      lastBoxSize += 20;
      const letter = letters[Math.floor(Math.random() * letters.length)];
      newBox.style.fontSize = ((lastBoxSize+20) / 2) + 'px';
      newBox.style.display = 'flex';
      newBox.style.justifyContent = 'center';
      newBox.style.alignItems = 'center';
      newBox.innerText = letter;

      if (lastBox === 0 || lastBox === 4 || lastBox === 7)
      {
        newBox.style.marginLeft = '64px';
      }

      newBox.onclick = function ()
      {
        if (revealedBoxes.length < 2)
        {
          if(newBox.style.backgroundColor === 'green')
          {
            return;
          }
          if(revealedBoxes.length === 1)
          {
            if(revealedBoxes[0] === newBox)
            {
              return;
            }
          }
          newBox.style.color = 'white';
          revealedBoxes.push(newBox);
        }
        if (revealedBoxes.length === 2)
         {
          if (revealedBoxes[0].innerText === revealedBoxes[1].innerText)
          {
              revealedBoxes[0].style.backgroundColor = 'green';
              revealedBoxes[1].style.backgroundColor = 'green';
              revealedBoxes = [];
          }
          else
          {
            setTimeout(() =>
             {
              revealedBoxes[0].style.color = 'black';
              revealedBoxes[1].style.color = 'black';
              revealedBoxes = [];
            }, 1000);
          }
         }
      };
      lastBox ++;
      main.appendChild(newBox);
    }
  });

  
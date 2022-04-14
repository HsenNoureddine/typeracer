let texts = document.getElementsByClassName("text");
let text = texts[1];
let test = "";
let number = 5;
async function receive(e = 5) {
  let response = await fetch(
    `https://random-word-api.herokuapp.com/word?number=${e}`
  );
  let data = await response.json();
  test = JSON.stringify(data);
  test = test.replaceAll("[", "");
  test = test.replaceAll("]", "");
  test = test.replaceAll('"', "");
  test = test.replaceAll(",", "\u2003");
  text.textContent = test;
}
receive();
function receivedata() {
  var xobj = new XMLHttpRequest();
  xobj.overrideMimeType("application/txt");
  xobj.open("GET", "data.txt", true);
  xobj.onreadystatechange = function () {
    if (xobj.readyState == 4 && xobj.status == "200") {
      let para = xobj.responseText;
      para = para.split('"para":');
      let index = Math.floor(Math.random() * 2411);
      test = para[index];
      test = test.replace('"', "");
      test = test.substring(0, test.length - 7);
      test = test.trimStart();
      test = test.trimEnd();
      test = test.replaceAll(" ", "\u2003");
      text.textContent = test;
      number = test.split("\u2003").length;
      document.getElementsByClassName("words")[0].value = number;
    }
  };
  xobj.send(null);
}
// receivedata();

let userRight = texts[0];

let input = document.getElementsByTagName("textarea");
let userinput = input[0];

let ans = text.textContent;
let pos = 0;

const color = (e, s) => {
  pos++;
  userRight.style.marginRight = "-0.5em";

  userRight.textContent = test.substring(0, pos);
  text.textContent = text.textContent.substring(1);
  if (text.textContent.length == 0) {
    let seconds = (Date.now() - timer) / 1000;
    let wps = number / seconds;
    let wpm = Math.floor(wps * 60);

    let score = document.getElementsByClassName("wpm")[0].querySelector("h1");
    score.textContent = wpm;
    score.style.fontSize = "2em";
    score.style.fontFamily = "monospace";
  }
};
let timer = 0;
const reload = () => {
  userinput.value = "";
  userRight.textContent = "";
  pos = 0;
  timer = 0;
  number = document.getElementsByClassName("words")[0].value;
  userRight.style.marginRight = "0";
  if (!document.getElementById("2").checked) receive(number);
  else receivedata();
};

document.getElementsByTagName("button")[0].addEventListener("click", reload);
document.addEventListener("keyup", (e) => {
  console.log(e.key);
  if (e.key == "Backspace") return;
  if (!timer) timer = Date.now();
  if (e.key == "CapsLock") return;
  for (let i = 0; i <= pos; i++) {
    if (userinput.value[i] == " " && test[i] == "\u2003") continue;
    if (userinput.value[i] != test[i]) return;
  }
  color(e.key, userinput.value);
});

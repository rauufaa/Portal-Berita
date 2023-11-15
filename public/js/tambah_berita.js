var id = 0;
// const newsElement = {
//     id: 0,
//     h2: `<h2 contenteditable="true" class="relative">Isi Header
//         <span id="popup${this.id}" class="absolute hidden left-4 bottom-2 z-10 bo">Ini popup close</span>
//     </h2>`,
//     p: `<p contenteditable="true">Isi Paragrap</p>`
// }
//const h2 = `<h2 contenteditable="true" class="relative" onmouseover="">Isi Header</h2>`

function elementCreate(elementType) {
  let time;
  let iddata = id;
  let parent = document.createElement(elementType);
  let text = document.createTextNode("Halo semua");
  parent.appendChild(text);

  parent.setAttribute("contenteditable", "true");
  parent.classList.add("relative");
  parent.appendChild(poppup(iddata, parent));

  parent.addEventListener("", () => {
    clearTimeout(time);
    $("#popup" + iddata).show();
    time = setTimeout(() => {
      $("#popup" + iddata).hide();
    }, 5000);
  });
  parent.addEventListener("focusout", () => {
    clearTimeout(time);
    time = setTimeout(() => {
      $("#popup" + iddata).hide();
    }, 1000);
  });

  id++;
  return parent;
}

function poppup(iddata, parentEl) {
  let parent = document.createElement("button");
  let text = document.createTextNode("Ini popup");
  parent.appendChild(text);
  parent.id = `popup${iddata}`;
  parent.classList.add(
    "absolute",
    "hidden",
    "left-96",
    "bottom-3",
    "z-10",
    "pb-8"
  );
  parent.addEventListener("click", () => {
    parentEl.remove();
  });

  return parent;
}

function createPhoto(input) {
  let parent;

  if (input) {
    parent = document.createElement("div");
    imageCon = document.createElement("img");
    let reader = new FileReader();
    reader.onload = function (event) {
      let time;
      let iddata = id;
      imageCon.setAttribute("src", event.target.result);
      console.log(event.target.result);
      parent.setAttribute("contenteditable", "true");
      parent.appendChild(imageCon);
      parent.appendChild(poppup(iddata, parent));
      parent.classList.add("relative");
      parent.addEventListener("focusin", () => {
        clearTimeout(time);
        console.log("sfasf");
        $("#popup" + iddata).show();
        time = setTimeout(() => {
          $("#popup" + iddata).hide();
        }, 5000);
      });
      parent.addEventListener("focusout", () => {
        clearTimeout(time);
        time = setTimeout(() => {
          $("#popup" + iddata).hide();
        }, 1000);
      });
      id++;
    };
    reader.readAsDataURL(input);
  }
  return parent;
}

$("#createHeader").on("click", () => {
  $(".editable").append(elementCreate("h2"));
});

$("#createParagraph").on("click", () => {
  $(".editable").append(elementCreate("a"));
});

$("#kirim").on("click", () => {
  $(".editable")
    .children()
    .each((index, element) => {
      console.log(element.innerText, element.tagName);
    });
  console.log(
    $(".editable")
      .children()
      .each((i) => {
        console.log(i);
      })
  );
});

$("#imgInp").on("input", () => {
  console.log($("#imgInp").prop("files")[0]);
  $(".editable").append(createPhoto($("#imgInp").prop("files")[0]));
  $("#imgInp").val(null)
});

// function createElement(element){
//     console.log(element)
//     $(".editable").append(newsElement.p)
//     if(element != "h2"){
//         $(".editable").append(newsElement.p)
//         return true;
//     }
//     $(".editable").append(elementH2())
//     return true;
// }
// function onHover(){

// }

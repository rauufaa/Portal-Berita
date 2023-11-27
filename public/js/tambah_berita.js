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

  parent.addEventListener("focusin", () => {
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

function makeHeader() {
  let idElement = id;
  let time;
  const parent = document.createElement("div");
  parent.classList.add("relative");
  const headerElement = document.createElement("input");

  headerElement.type = "text";
  headerElement.name = `h-${idElement}`;
  headerElement.placeholder = "Isi Header DISINI";
  headerElement.classList.add("text-3xl", "font-bold", "border-none");

  headerElement.addEventListener("focusin", () => {
    clearTimeout(time);
    $("#popup" + idElement).show();
    time = setTimeout(() => {
      $("#popup" + idElement).hide();
    }, 5000);
  });
  headerElement.addEventListener("focusout", () => {
    clearTimeout(time);
    time = setTimeout(() => {
      $("#popup" + idElement).hide();
    }, 1000);
  });

  let buttonClose = poppup(idElement, parent);

  parent.appendChild(headerElement);
  parent.appendChild(buttonClose);
  id++;

  const element = `<input type="text" name="h-${idElement}" class="text-3xl font-bold"/>`;
  return parent;
}

function makeParagraph() {
  let idElement = id;
  let time;
  const parent = document.createElement("div");
  parent.classList.add("relative");
  const paragraphElement = document.createElement("textarea");

  paragraphElement.type = "text";
  paragraphElement.name = `a-${idElement}`;
  paragraphElement.placeholder = "Isi Paragraph DISINI";
  paragraphElement.classList.add("text-3xl", "font-bold", "border-none");

  paragraphElement.addEventListener("focusin", () => {
    clearTimeout(time);
    $("#popup" + idElement).show();
    time = setTimeout(() => {
      $("#popup" + idElement).hide();
    }, 5000);
  });
  paragraphElement.addEventListener("focusout", () => {
    clearTimeout(time);
    time = setTimeout(() => {
      $("#popup" + idElement).hide();
    }, 1000);
  });

  let buttonClose = poppup(idElement, parent);

  parent.appendChild(paragraphElement);
  parent.appendChild(buttonClose);
  id++;

  // const element = `<input type="text" name="h-${idElement}" class="text-3xl font-bold"/>`;
  return parent;
}

function ekspresifHeader() {
  let $element = $(`
      <div class=" max-w-full flex flex-auto" draggable="true">
        <div class="w-fit py-2 pr-2 text-gray-500 rounded hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </div>
        <div class="w-full gap-3 items-center">
          <div class="flex items-center justify-between w-full px-2">
            <label >Item Header</label>
            <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            </button>
          </div>
          <textarea name="h-${id}" wrap="soft" class="block p-2.5 w-full text-xl font-medium text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        </div>
      </div>
    `);

  $element.find("button").on("click", () => {
    $element.remove();
    if ($("#editable").children().length == 1) {
      console.log($("#editable").children());
      $("#placeholder").removeClass("hidden");
    }
  });

  $element.find("textarea").on("keydown", (event) => {
    console.log("halo");
    if ($element.find("textarea").val() == "") {
      if (event.key == "Backspace") {
        $element.remove();
        if ($("#editable").children().length == 1) {
          $("#placeholder").removeClass("hidden");
        }
      }
    }
  });

  $element.on("drag", () => {
    //alert("memek");
  });

  id++;

  return $element;
}

function ekspresifParagraph() {
  let $element = $(`
    <div class=" max-w-full flex flex-auto" draggable="true">
      <div class="w-fit py-2 pr-2 text-gray-500 rounded hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </div>
      <div class="w-full gap-3 items-center">
        <div class="flex items-center justify-between w-full px-2">
          <label >Item Paragraph</label>
          <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          </button>
        </div>
        <textarea name="p-${id}" wrap="soft" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
      </div>
    </div>
    `);

  $element.find("button").on("click", () => {
    $element.remove();
    if ($("#editable").children().length == 1) {
      console.log($("#editable").children());
      $("#placeholder").removeClass("hidden");
    }
  });

  $element.find("textarea").on("keydown", (event) => {
    console.log("halo");
    if ($element.find("textarea").val() == "") {
      if (event.key == "Backspace") {
        $element.remove();
        if ($("#editable").children().length == 1) {
          $("#placeholder").removeClass("hidden");
        }
      }
    }
  });

  id++;
  return $element;
}

function ekspresifPicture() {
  let $element = $(`
    <div class=" max-w-full flex flex-auto" draggable="true">
      <div class="w-fit py-2 pr-2 text-gray-500 rounded hover:text-gray-900 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </div>
      <div class="w-full gap-3 items-center">
        <div class="flex items-center justify-between w-full px-2">
          <label >Item Photo</label>
          <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          </button>
        </div>
        
          <input name="img-${id}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
          <img id="image_preview" class=" w-50 m-auto p-2"/>  
      </div>
    </div>
    
  `);

  $element.find("input").on("input", () => {
    if ($element.find("input").prop("files")[0]) {
      //console.log($element.children("input").prop("files")[0])
      let reader = new FileReader();
      reader.onload = function (event) {
        console.log("jalan");
        $element.find("img").attr("src", event.target.result);
      };
      reader.readAsDataURL($element.find("input").prop("files")[0]);
    }
  });

  $element.find("button").on("click", () => {
    $element.remove();
    if ($("#editable").children().length == 1) {
      console.log($("#editable").children());
      $("#placeholder").removeClass("hidden");
    }
  });

  id++;

  return $element;
}

function makePicture() {
  let idElement = id;
  const parent = document.createElement("div");
  const imageElement = document.createElement("input");
  const preview = document.createElement("img");

  imageElement.type = "file";
  imageElement.name = `img-${idElement}`;
  imageElement.classList =
    "block max-w-lg text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400";
  parent.classList.add("relative");
  imageElement.addEventListener("", () => {
    if (imageElement.files[0]) {
      let reader = new FileReader();
      reader.onload = function (event) {
        preview.src = event.target.result;
      };
      reader.readAsDataURL(imageElement.files[0]);
    }
  });

  const buttonClose = document.createElement("button");
  buttonClose.textContent = "Hapus";
  buttonClose.addEventListener("click", () => {
    parent.remove();
  });

  parent.appendChild(imageElement);
  parent.appendChild(buttonClose);
  parent.appendChild(preview);
  id++;
  return parent;
}

// $("#createHeader").on("click", () => {
//   $(".editable").append(elementCreate("h2"));
// });

// $("#createParagraph").on("click", () => {
//   $(".editable").append(elementCreate("a"));
// });

$("#createHeader").on("click", () => {
  if (!$("#placeholder").hasClass("none")) $("#placeholder").addClass("hidden");
  $("#editable").append(ekspresifHeader());
});

$("#createParagraph").on("click", () => {
  if (!$("#placeholder").hasClass("none")) $("#placeholder").addClass("hidden");
  $("#editable").append(ekspresifParagraph());
});

$("#createPic").on("click", () => {
  if (!$("#placeholder").hasClass("none")) $("#placeholder").addClass("hidden");
  $("#editable").append(ekspresifPicture());
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
  $("#imgInp").val(null);
});

$("#ep").on("click", () => {
  $(".editable").append(ekspresifPicture());
});

$("#tumbnail").on("input", ()=>{
  if ($("#tumbnail").prop("files")[0]) {
    //console.log($element.children("input").prop("files")[0])
    let reader = new FileReader();
    reader.onload = function (event) {
      console.log("jalan");
      $("#tumbnail_preview").attr("src", event.target.result);
    };
    reader.readAsDataURL($("#tumbnail").prop("files")[0]);
  }
})

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

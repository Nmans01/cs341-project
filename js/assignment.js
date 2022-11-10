(function () {
    "use strict";
  
    const URL = " ";
  
    window.addEventListener("load", init);
  
    /**
     * 
     */
    function init() {
      id("assigment").innerText = getJsonData;
    }
  
    /**
     * Fetches and displays JSON data for a random city.
     */
    function getJsonData() {
      id("assignment").innerHTML = "";
      //let url = URL + "?city=random";
  
      postName();
    }
    async function postName() {
        const object = { name: 'James Gordon' };
        const response = await fetch('/api/names', {
          method: 'POST',
          body: JSON.stringify(object)
        });
        const responseText = await response.text();
        console.log(responseText); // logs 'OK'
      }
      postName();
  
    /**
     * Function to load the POI JSON data into the page.
     * @param data - the data that is being returned from the API in JSON format
     */
    function loadData(data) {
      let response = id("assignment");
      // Add the site name, city name
      let siteName = document.createElement("p");
      siteName.innerText = data["poi"] + ", " + data["name"];
      response.appendChild(siteName);
  
      // Add the image
      let img = document.createElement("img");
      img.src = data["img"];
      img.alt = data["poi"];
      response.appendChild(img);
  
    }
  
    /* ------------------------------ Helper Functions  ------------------------------ */
    // Note: You may use these in your code, but do remember that your code should not have
    // any functions defined that are unused.
  
    /**
     * Returns the element that has the ID attribute with the specified value.
     * @param {string} idName - element ID
     * @returns {object} DOM object associated with id.
     */
    function id(idName) {
      return document.getElementById(idName);
    }
  
    /**
     * Helper function to return the response's result text if successful, otherwise
     * returns the rejected Promise result with an error status and corresponding text
     * @param {object} response - response to check for success/error
     * @returns {object} - valid result text if response was successful, otherwise rejected
     *                     Promise result
     */
    function checkStatus(response) {
      if (response.status >= 200 && response.status < 300 || response.status === 0) {
        return response.text();
      } else {
        return Promise.reject(new Error(response.status + ": " + response.statusText));
      }
    }
  
  })();
  
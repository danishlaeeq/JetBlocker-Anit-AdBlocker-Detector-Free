jQuery(function() {
    "use strict";

    /**
     * All of the Javascript code for checking if the internet is connected should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    // Selecting all required elements
    const jetblocker_detect = document.querySelector("#jetblocker-detect");
    const wrapper = document.querySelector(".jetblocker-wrapper");
    const overlay = document.querySelector(".jetblocker_overlay");
    const body = document.getElementsByTagName("body");
    const button = wrapper.querySelector(".jetblock-whitelist-btn");

    let adClasses = ["ad", "ads", "adsbox", "doubleclick", "ad-placement", "ad-placeholder", "adbadge", "BannerAd"];
    for (let item of adClasses) {
        jetblocker_detect.classList.add(item);
    }
    let getProperty = window.getComputedStyle(jetblocker_detect).getPropertyValue("display");

   
    if (!wrapper.classList.contains("show")) {
        getProperty == "none" ? wrapper.classList.add("show") : wrapper.classList.remove("show");
    }
    button.addEventListener("click", () => {
        wrapper.classList.remove("show");
        overlay.classList.remove("show");
    });
    if (!overlay.classList.contains("show")) {
        getProperty == "none" ? overlay.classList.add("show") : overlay.classList.remove("show");
    }


    // Using Countdown timer loop to retry connecting
    setInterval(() => {
        //this setInterval function call ajax frequently after 100ms
         if (!wrapper.classList.contains("show")) {
            getProperty == "none" ? wrapper.classList.add("show") : wrapper.classList.remove("show");
        }
        if (!overlay.classList.contains("show")) {
            getProperty == "none" ? overlay.classList.add("show") : overlay.classList.remove("show");
        }
    }, 1000);
});
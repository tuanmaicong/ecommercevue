(function($){"use strict";jQuery(document).ready(function(){class LocalizationForm extends HTMLElement{constructor(){super(),this.elements={input:this.querySelector('input[name="language_code"], input[name="country_code"]'),button:this.querySelector("button"),panel:this.querySelector("ul")},this.elements.button.addEventListener("click",this.openSelector.bind(this)),this.elements.button.addEventListener("focusout",this.closeSelector.bind(this)),this.addEventListener("keyup",this.onContainerKeyUp.bind(this)),this.querySelectorAll("a").forEach(item=>item.addEventListener("click",this.onItemClick.bind(this)))}hidePanel(){this.elements.button.setAttribute("aria-expanded","false"),this.elements.panel.setAttribute("hidden",!0)}onContainerKeyUp(event){event.code.toUpperCase()==="ESCAPE"&&(this.hidePanel(),this.elements.button.focus())}onItemClick(event){event.preventDefault();const form=this.querySelector("form");this.elements.input.value=event.currentTarget.dataset.value,form&&form.submit()}openSelector(){this.elements.button.focus(),this.elements.panel.toggleAttribute("hidden"),this.elements.button.setAttribute("aria-expanded",(this.elements.button.getAttribute("aria-expanded")==="false").toString())}closeSelector(event){const shouldClose=event.relatedTarget&&event.relatedTarget.nodeName==="BUTTON";(event.relatedTarget===null||shouldClose)&&this.hidePanel()}}customElements.define("localization-form",LocalizationForm)})})(jQuery);
//# sourceMappingURL=/cdn/shop/t/6/assets/theme.js.map?v=140164944192632260331661244625

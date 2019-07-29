var Animation = function({ offset } = { offset: 10 }) {
  var _elements;

  // Define a dobra superior, inferior e laterais da tela
  var windowTop = offset * window.innerHeight / 100;
  var windowBottom = window.innerHeight - windowTop;
  var windowLeft = 0;
  var windowRight = window.innerWidth;

  function start(element) {
    // Seta os atributos customizados
    element.style.animationDelay = element.dataset.animationDelay;
    element.style.animationDuration = element.dataset.animationDuration;
    // Inicia a animacao setando a classe da animacao
    element.classList.add(element.dataset.animation);
    // Seta o elemento como animado
    element.dataset.animated = "true";
  }

  function isElementOnScreen(element) {
    // Obtem o boundingbox do elemento
    var elementRect = element.getBoundingClientRect();
    var elementTop =
      elementRect.top + parseInt(element.dataset.animationOffset) ||
      elementRect.top;
    var elementBottom =
      elementRect.bottom - parseInt(element.dataset.animationOffset) ||
      elementRect.bottom;
    var elementLeft = elementRect.left;
    var elementRight = elementRect.right;

    // Verifica se o elemento esta na tela
    return (
      elementTop <= windowBottom &&
      elementBottom >= windowTop &&
      elementLeft <= windowRight &&
      elementRight >= windowLeft
    );
  }

  // Percorre o array de elementos, verifica se o elemento está na tela e inicia animação
  function checkElementsOnScreen(els = _elements) {
    for (var i = 0, len = els.length; i < len; i++) {
      // Passa para o proximo laço se o elemento ja estiver animado
      if (els[i].dataset.animated) continue;

      isElementOnScreen(els[i]) && start(els[i]);
    }
  }

  // Atualiza a lista de elementos a serem animados
  function update() {
    _elements = document.querySelectorAll(
      "[data-animation]:not([data-animated])"
    );
    checkElementsOnScreen(_elements);
  }

  // Inicia os eventos
  window.addEventListener("load", update, false);
  window.addEventListener("scroll", () => checkElementsOnScreen(_elements), { passive: true });
  window.addEventListener("resize", () => checkElementsOnScreen(_elements), false);

  // Retorna funcoes publicas
  return {
    start,
    isElementOnScreen,
    update
  };
};

// Initialize
var options = {
  offset: 20 //percentage of window
};
var animation = new Animation(options);
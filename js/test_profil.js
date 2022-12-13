function randomInteger(max, min = 0) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  
  function getDirection() {
    const directions = [
      new Vector({ x: 0, y: -1 }),
      new Vector({ x: 1, y: 0 }),
      new Vector({ x: 0, y: 1 }),
      new Vector({ x: -1, y: 0 })
    ];
  
    return directions[randomInteger(directions.length - 1)];
  }
  
  class Vector {
    constructor(options) {
      const defaults = {
        x: 0,
        y: 0
      };
  
      Object.assign(this, defaults, options);
    }
  
    add(vector) {
      this.x += vector.x;
      this.y += vector.y;
  
      return this;
    }
  
    multiply(scalar) {
      this.x *= scalar;
      this.y *= scalar;
  
      return this;
    }
  }
  
  class Walker {
    constructor(options) {
      const defaults = {
        position: new Vector({
          x: 0,
          y: 0
        }),
        size: 5
      };
  
      Object.assign(this, defaults, options);
    }
  
    render(context) {
      context.fillStyle = "rgba(0, 0, 0, 0.125)";
      context.fillRect(this.position.x, this.position.y, this.size, this.size);
    }
  }
  
  class RandomWalker {
    constructor(element, options) {
      const defaults = {
        walker: {
          size: 5,
          stepSize: 10
        }
      };
  
      this.options = Object.assign(defaults, options);
  
      this.canvas = element;
      this.context = this.canvas.getContext("2d");
  
      this.walker = new Walker({
        position: new Vector({
          x: window.innerWidth / 2,
          y: window.innerHeight / 2
        }),
        size: this.options.walker.size
      });
  
      this.setSize();
      this.update(this.context);
    }
  
    render(context) {
      this.walker.render(context);
    }
  
    update(context) {
      const direction = getDirection();
  
      this.walker.position.add(direction.multiply(this.options.walker.stepSize));
  
      this.render(context);
  
      requestAnimationFrame(() => this.update(context));
    }
  
    setSize() {
      this.canvas.width = window.innerWidth;
      this.canvas.height = window.innerHeight;
    }
  }
  
  const randomWalker = new RandomWalker(
    document.querySelector(".js-random-walker")
  );
  
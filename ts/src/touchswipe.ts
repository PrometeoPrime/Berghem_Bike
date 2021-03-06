export class TouchSwipe {
  private element: any;
  private swipeLenght: number;
  private xDown: number;
  private yDown: number;

  private status = false;

  constructor(element: any, swipeLenght?: number) {
    this.xDown = 0;
    this.yDown = 0;
    this.element = element;
    if (swipeLenght != undefined) this.swipeLenght = swipeLenght;
    else this.swipeLenght = 10;
    if (this.element != undefined) {
      this.element.addEventListener('touchstart', (evt: TouchEvent) => {
        this.xDown = evt.touches[0].clientX;
        this.yDown = evt.touches[0].clientY;
      });
    } else {
      alert('Error: element is undefined!');
    }
  }

  public onLeft(callback?: () => void): void {
    if (callback != undefined) this.onLeft = callback;
  }

  public onRight(callback?: () => void): void {
    if (callback != undefined) this.onRight = callback;
  }

  public onUp(callback?: () => void): void {
    if (callback != undefined) this.onUp = callback;
  }

  public onDown(callback?: () => void): void {
    if (callback != undefined) this.onDown = callback;
  }

  private handleTouchMove(evt: TouchEvent) {
    if (!this.xDown || !this.yDown) {
      return;
    }

    const xUp = evt.touches[0].clientX;
    const yUp = evt.touches[0].clientY;

    const xDiff = this.xDown - xUp;
    const yDiff = this.yDown - yUp;

    if (Math.abs(xDiff) > Math.abs(yDiff)) {
      if (xDiff > 0 + this.swipeLenght) {
        this.onLeft();
      } else if (xDiff < 0 - this.swipeLenght) {
        this.onRight();
      }
    } else {
      if (yDiff > 0 + this.swipeLenght) {
        this.onUp();
      } else if (yDiff < 0 - this.swipeLenght) {
        this.onDown();
      }
    }
    this.xDown = 0;
    this.yDown = 0;
  }

  public start() {
    if (!this.status) {
      this.status = true;
      this.element.addEventListener('touchmove', (evt: TouchEvent) => {
        this.handleTouchMove(evt);
      });
    }
  }

  public stop() {
    if (this.status) {
      this.status = false;
      this.element.addRemoveListener('touchmove', (evt: TouchEvent) => {
        this.handleTouchMove(evt);
      });
    }
  }
}

import {ResponsiveManager}  from './responsive.js';
import {TouchSwipe}         from './touchswipe.js';
import {UserHandler}        from './userhandler.js';
import {Notification}       from './notifications.js';
import {Modal}              from './modal.js';

export class UIManager {
  private responsive:       ResponsiveManager;
  private userhandler:      UserHandler;
  private notify:           Notification;
  private swipe:            TouchSwipe | undefined;
  private modals:           Modal[] = [];

  private pageContainer:    HTMLElement | undefined | null;

  constructor(...allmodals: Modal[]) 
  {
    let login = sessionStorage.getItem('logged');
    if(login === 'true')
      this.responsive = new ResponsiveManager(800, true);
    else
      this.responsive = new ResponsiveManager(800, false);
    this.notify = new Notification(allmodals, this.responsive.getContentContainer());
    this.userhandler = new UserHandler(this.responsive, this.notify);

    this.pageContainer = this.responsive.getPageContainer();
    this.modals = this.notify.getModals();

    this.init();
  }

  /**
   * Initializes mobile responsiveness
   * Adds event listeners for modals
   **/
  private init() {
    //Responsiveness
    if (this.pageContainer != undefined) {
      const mobile = this.responsive.isMobileResponsive();
      if (mobile === true) {
        this.swipe = new TouchSwipe(this.pageContainer, 10);
        this.swipe.onRight(() => {
          const mobileStatus = this.responsive.isMobileModeActive();
          const menuStatus = this.responsive.isMenuOpen();
          if (mobileStatus === true && menuStatus === true) {
            this.responsive.toggleMenu();
          }
        });
        this.swipe.onLeft(() => {
          const mobileStatus = this.responsive.isMobileModeActive();
          const menuStatus = this.responsive.isMenuOpen();
          if (mobileStatus === true && menuStatus === false) {
            this.responsive.toggleMenu();
          }
        });
        this.swipe?.start();
      }
    }
  /*Modals*/
    for (const modal of this.modals) {
      modal.onOpen(() => {
        if (modal.getState() === false) {
          //OPEN MODAL
          modal.openModal();
          modal.setState(true);
        }
      });

      modal.onClose(() => {
        if (modal.getState() === true) {
          //HANDLE TIMERS
          this.notify.clearCurModalMsgField();
          this.notify.clearTimers('modal');
          //CLOSE MODAL
          modal.closeModal();
          modal.setState(false);
        }
      });
    }
  }
}

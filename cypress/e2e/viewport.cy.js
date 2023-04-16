

// user hourneys on different viewports
// these tests change the screen to different
// viewport sizes then check to see if appropriate content
// appears. 
describe('user journeys', () => {

    beforeEach(() => {
      cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/')
    })

    it('iphone-7', () => {
        cy.viewport('iphone-7')
        cy.get('.main-nav').should('not.be.visible')
        cy.get('#nav-icon1').should('be.visible')
        cy.get('h1').should('not.be.visible')
     
      })

      it('ipad-2', () => {
        cy.viewport('ipad-2')
        cy.get('.main-nav').should('not.be.visible')
        cy.get('#nav-icon1').should('be.visible')
      })

      it('macbook-16', () => {
        cy.viewport('macbook-16')
        cy.get('.main-nav').should('be.visible')
        cy.get('#nav-icon1').should('not.be.visible')
      })
    
})
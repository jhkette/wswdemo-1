import 'cypress-axe'

describe('accessibility testing', () => {
    it('should pass accessibility test', () => {
        cy.visit('http://mysite.test/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
    it('should pass accessibility test', () => {
        cy.visit('http://mysite.test/activities/')
        cy.injectAxe()
        cy.checkA11y()
    })

         
    it('should pass accessibility test', () => {
        cy.visit('http://mysite.test/events/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
    it('should pass accessibility test', () => {
        cy.visit('http://mysite.test/news/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
      

})
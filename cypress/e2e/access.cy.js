import 'cypress-axe'

// accessibility testing using cypress-axe
describe('accessibility testing', () => {
    it('should pass accessibility test', () => {
        cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
    it('should pass accessibility test', () => {
        cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/activities/')
        cy.injectAxe()
        cy.checkA11y()
    })

         
    it('should pass accessibility test', () => {
        cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/events/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
    it('should pass accessibility test', () => {
        cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/news/')
        cy.injectAxe()
        cy.checkA11y()
    })
      
      

})
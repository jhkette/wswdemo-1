const CAL_API = "AIzaSyBs4W8WmNLu8Kx3H7b9bjYUn5qPYcRwo-k";
const CAL_ID = "joseph.ketterer@gmail.com"
const BASEPARAMS = `orderBy=startTime&singleEvents=true&timeMin=${new Date().toISOString()}`;
const BASEURL = `https://www.googleapis.com/calendar/v3/calendars/${CAL_ID}/events?${BASEPARAMS}`;

const finalURL = `${BASEURL}&key=${CAL_API}`;



context("GET /users", () => {
    it("gets a list of users", () => {
      cy.request("GET", finalURL).then((response) => {
        expect(response.status).to.eq(200)
        expect(response.body.items).length.to.be.greaterThan(1)
      })
    })
  })



  // context("GET /users", () => {
  //   it("gets a list of users", () => {
  //     cy.request("GET",  finalURLIncorrect).then((response) => {
  //       expect(response.status).to.eq(400)
        
  //     })
  //   })
  // })
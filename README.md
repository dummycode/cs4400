# cs4400
**Disclaimer** : This project is the final project for Georgia Tech's CS 4400 class. This class is an introduction to database systems and therefore our final project simply had to accomplish a variety of tasks, good design and security was not considered in grading, and therefore often overlooked to make the application easier to develop. That being said below is a list of shortcomings we recognize.

### Shortcomings:
- Token system. Yes, we realize storing an authenticated user's id in a cookie and treating them as that user indefinitely is in no way secure, but this was simply the easiest way to get it working.
- Preparing SQL statements. Yes, we know we should prepare statements to prevent sequel injection attacks. But, we were lazy and this code should never see the light of day on a production server.
- Design. Or lack there of. The application is ugly, but it works?

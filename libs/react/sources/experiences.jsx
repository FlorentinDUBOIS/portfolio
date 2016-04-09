import React          from "react";
import Timeline       from "./components/timeline.jsx";
import TimelineItem   from "./components/timeline-item.jsx";
import TimelineHeader from "./components/timeline-header.jsx";
import Container      from "./components/container.jsx";
import Overflow       from "./components/overflow.jsx";

export default class Experiences extends React.Component {
    constructor( props ) {
        super( props );
    }

    render() {
        return(
            <Container>
                <div className="row" >
                    <div className="col s8 offset-s4" >
                        <Overflow reverse={true}>
                            <Timeline>
                                <TimelineItem date="Coming soon" >
                                    <TimelineHeader>Work at SII as developer</TimelineHeader>

                                    <p>I will work as developer</p>
                                </TimelineItem>

                                <TimelineItem date="October 2015 to Now" >
                                    <TimelineHeader>Engineer cycle at ISEN Brest</TimelineHeader>

                                    <p>Wooh</p>
                                </TimelineItem>

                                <TimelineItem date="October 2014 to October 2015" >
                                    <TimelineHeader>Work at aC3 as web developer</TimelineHeader>

                                    <p>I worked as web developer for manage a web application name “Immo-facile”.</p>
                                </TimelineItem>

                                <TimelineItem date="June 2014 to August 2014" >
                                    <TimelineHeader>Work at aC3 as trainee web developer</TimelineHeader>

                                    <p>I worked as web developer for manage a web application name “Immo-facile”.</p>
                                </TimelineItem>

                                <TimelineItem date="September 2012 to October 2015" >
                                    <TimelineHeader>CIR at ISEN Brest</TimelineHeader>

                                    <p>Technical courses.</p>
                                </TimelineItem>
                            </Timeline>
                        </Overflow>
                    </div>
                </div>
            </Container>
        );
    }
}

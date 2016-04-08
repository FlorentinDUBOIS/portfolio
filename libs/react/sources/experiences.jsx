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
                    <div className="col s9 offset-s3" >
                        <Overflow reverse={true}>
                            <Timeline>
                                <TimelineItem date="now" >
                                    <TimelineHeader>djofsof</TimelineHeader>

                                    <p>sdpkgfopgk;</p>
                                </TimelineItem>

                                <TimelineItem date="before" >
                                    <TimelineHeader>djofsof</TimelineHeader>

                                    <p>sdpkgfopgk;</p>
                                </TimelineItem>

                                <TimelineItem date="before after" >
                                    <TimelineHeader>djofsof</TimelineHeader>

                                    <p>sdpkgfopgk;</p>
                                </TimelineItem>

                                <TimelineItem date="before next" >
                                    <TimelineHeader>djofsof</TimelineHeader>

                                    <p>sdpkgfopgk;</p>
                                </TimelineItem>
                            </Timeline>
                        </Overflow>
                    </div>
                </div>
            </Container>
        );
    }
}
